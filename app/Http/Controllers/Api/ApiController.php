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
use Illuminate\Http\Response;


class ApiController extends Controller {
	
	use StatusCodeTrait;
	
	protected $responseCode = 200;
	
	/**
	 * @param $code
	 * @return $this
	 */
	public function setResponseCode( $code ) {
		if ( is_numeric( $code ) ) {
			$this->responseCode = $code;
		}
		
		return $this;
	}
	
	/**
	 * @param $data
	 */
	public function respondWithJson( $data ) {
		return response()->json( $data, $this->responseCode );
	}
	
	/**
	 * @param array $extra
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function respondWithSuccess( array $extra = [] ) {
		return $this->createResponseMessage( Response::HTTP_OK, self::$SUCCESS, 'action successful', $extra );
	}
	
	/**
	 * @param array $extra
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function respondWithFailure( array $extra = [] ) {
		return $this->createResponseMessage( Response::HTTP_INTERNAL_SERVER_ERROR, self::$ERROR, 'action failed', $extra );
	}
	
	/**
	 * @param array $extra
	 * @return \Illuminate\Http\JsonResponse
	 */
	protected function createResponseMessage( $http_code, $app_code, $message, array $extra ) {
		return $this->setResponseCode( $http_code )->respondWithJson( array_merge( [
			'code'    => $app_code,
			'message' => $message
		], $extra ) );
	}
}