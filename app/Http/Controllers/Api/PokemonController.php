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
     * Undocumented function
     *
     * @return string
     */
    public function load(Request $request){
      $url = $request->input('api-url');
  
      $responseData = $this->loadTransformedData($url);
      
      //return a formatted json
      return $this->respondWithJson($responseData);
    }
  
    /**
     * @param \Illuminate\Http\Request $request
     */
    public function store(Request $request) {
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
	    if(Pokemon::all()->count() == 0){
		    $dbResult = Pokemon::storeAllIf($pokemons, count($pokemons) == $results->count());
	    } else { return $this->respondWithSuccess(['message' => 'Data already exists!']); }
      
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
   * @param $item
   * @param $data
   * @return array
   */
  private function formatItem($item, $data){
  	Log::info($item);
    return [
    	'id' => $this->getPokemonIdFromUrl($item['url']),
	    'api_url' => $item['url'],
	    'name' => $item['name'],
	    'profile' => $data];
  }
	
	/**
	 * @param string $url
	 * @return integer
	 */
  private function getPokemonIdFromUrl($url){
  	$parts = explode('/', $url);
  	return $parts[ count($parts) - 2 ];
  }
}
