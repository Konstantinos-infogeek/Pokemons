<?php

namespace PokeApp\Models;

use GuzzleHttp\Client as HttpClient;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class PokemonApi extends Model
{
  
  private $single_pokemon_endpoint = 'http://pokeapi.co/api/v2/pokemon/';
  
  /**
   * Makes some api call to pokeapi and returns a raw result of response's body
   *
   * @param $url
   * @return string
   */
    public function loadData($url) {
      //quick url validation, to ensure no other url will pass easily
      if(!str_contains($url, '//pokeapi.co/api/v2/pokemon')) return '{}';
      
      //Store and retrieve pokemons key
      return Cache::rememberForever('pokemons', function () use($url) {
        $http = new HttpClient();
        return $http->request('GET', $url, ['verify' => false])->getBody()->getContents();
      });
    }
  
  /**
   * @param $id
   * @return string
   */
    public function loadItem($id) {
      $url = $this->single_pokemon_endpoint.$id;
      
      return Cache::rememberForever($url, function () use ($url) {
        $http = new HttpClient();
        return $http->request('GET', $url, ['verify' => false])->getBody()->getContents();
      });
    }
}
