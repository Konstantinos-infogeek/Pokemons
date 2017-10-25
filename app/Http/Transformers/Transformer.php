<?php

namespace PokeApp\Http\Transformers;


abstract class Transformer {
  
  /**
   * @param \Illuminate\Database\Eloquent\Collection $items
   *
   * @return mixed
   */
  public function many($items){
    return $items->map( function ( $item ) {
      return $this->transform( $item );
    });
  }
  
  /**
   * @param $item
   *
   * @return mixed
   */
  abstract function transform($item);
}