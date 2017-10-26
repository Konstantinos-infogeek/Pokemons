<?php

namespace PokeApp\Http\Controllers\Api;

use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use PokeApp\Http\Transformers\PokeApiResponseTransformer;
use PokeApp\Models\Pokemon;
use PokeApp\Models\PokemonApi as Poke;

class PokemonController extends ApiController
{
	
    private $pokemon_api;
    private $trasformer;
	
	/**
	 * PokemonController constructor.
	 *
	 * @param \PokeApp\Models\PokemonApi $pokemon_api
	 * @param \PokeApp\Http\Transformers\PokeApiResponseTransformer $transformer
	 */
    public function __construct(Poke $pokemon_api, PokeApiResponseTransformer
    $transformer) {
      $this->pokemon_api = $pokemon_api;
      $this->trasformer = $transformer;
    }
  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ['pokemon' => 10];
    }

    /**
     * Undocumented function
     *
     * @param [type] $id
     * @return void
     */
    public function show($id)
    {
        //
    }
    
    /**
     * Retrieves a json document with all pokemons, from
     * the pokeapi.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function load(Request $request){
      $url = $request->input('api-url');
  
      $responseData = $this->loadTransformedData($url);
      
      //return a formatted json
      return $this->respondWithJson($responseData);
    }
  
    /**
     * Retrieves a list of pokemons from cache and iterates through
     * them to get for each the profile json, and store the
     * formatted output to the database
     *
     * @param \Illuminate\Http\Request $request
     * @returns \Illuminate\Http\JsonResponse
     */
    public function store(Request $request) {
	  if ( Pokemon::all()->count() > 0 ) { //Checks database if data already exists
		    return $this->respondWithSuccess( [ 'message' => 'Data already exists!' ] );
	  }
    	
      $results = collect($this->loadTransformedData()['results']);
      $pokemons = [];
      
      //Iterate in results
      $results->each(function($current) use (&$pokemons){
      	$id = $this->getPokemonIdFromUrl($current['url']);
      	
        array_push($pokemons, $this->formatItem($current, $this->pokemon_api->loadItem($id)));
        
        //Sleep for 0.2sec to reduce the change of blocking client ip
        usleep(200);
      });
      
	  //Store in the database if all requests have been satisfied
	  $dbResult = Pokemon::storeAllIf( $pokemons, count( $pokemons ) == $results->count() );
      
      return !!$dbResult
	      ? $this->respondWithSuccess()
	      : $this->respondWithFailure();
    }
  
  /**
   * @param $url
   *
   * @return mixed
   */
  private function loadTransformedData($url = 'http://pokeapi.co/api/v2/pokemon/?limit=99999') {
    $data = $this->pokemon_api->loadData($url);
    
    $responseData = $this->trasformer->transform(
      \GuzzleHttp\json_decode($data, TRUE)
    );
    return $responseData;
  }
  
  /**
   * Formats data for database insertion
   *
   * @param $item
   * @param $data
   * @return array
   */
  private function formatItem($item, $data){
  	// Logs the progress of the retrieval script, in order to provide
	// a hard evidence of the process, if it takes too long to
	// to complete
  	Log::info($item);
  	
  	//returns an array formated for the ::insert method
    return [
    	'id' => $this->getPokemonIdFromUrl($item['url']),
	    'api_url' => $item['url'],
	    'name' => $item['name'],
	    'profile' => $data];
  }
	
	/**
	 * Extracts numeric id from pokemon's api url
	 *
	 * @param string $url
	 * @return integer
	 */
  private function getPokemonIdFromUrl($url){
  	$parts = explode('/', $url);
  	return $parts[ count($parts) - 2 ];
  }
}
