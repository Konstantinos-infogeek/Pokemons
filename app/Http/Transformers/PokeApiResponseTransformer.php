<?php
/**
 * Created by Konstantinos Tsatsarounos<konstantinos.tsatsarounos@gmail.com>
 * Project Name: Pokemons
 * Filename: PokeApiResponseTransformer.php
 * Date: 25-Oct-17
 * Time: 11:07 PM
 */

namespace PokeApp\Http\Transformers;


class PokeApiResponseTransformer extends Transformer {
  
  /**
   * @param $item
   *
   * @return mixed
   */
  function transform($item) {
    
    return [
      'count' => isset($item['count']) ? $item['count'] : 0,
      'results' => isset($item['results']) ? $item['results'] : []
    ];
  }
}