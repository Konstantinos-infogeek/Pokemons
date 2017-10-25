<?php

namespace PokeApp\Http\Controllers\Api;

use Illuminate\Http\Request;
use PokeApp\Http\Transformers\PokeApiResponseTransformer;
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
      
      $data = $this->pokemon_api->loadData($url);
      
      $responseData = $this->trasformer->transform(
        \GuzzleHttp\json_decode($data,true)
      );
      
      //return a formatted json
      return $this->respondWithJson($responseData);
    }
}
