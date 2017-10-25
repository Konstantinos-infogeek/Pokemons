<?php
/**
 * Created by Konstantinos Tsatsarounos<konstantinos.tsatsarounos@gmail.com>
 * Project Name: Pokemons
 * Filename: ApiController.php
 * Date: 25-Oct-17
 * Time: 11:24 PM
 */

namespace PokeApp\Http\Controllers\Api;

use PokeApp\Http\Controllers\Controller;

class ApiController extends Controller {
  
  protected $responseCode = 200;
  
  /**
   * @param $code
   *
   * @return $this
   */
  public function setResponseCode($code) {
    if (is_numeric($code)) {
      $this->responseCode = $code;
    }
    return $this;
  }
  
  /**
   * @param $data
   */
  public function respondWithJson($data) {
    return response()->json($data, $this->responseCode);
  }
}