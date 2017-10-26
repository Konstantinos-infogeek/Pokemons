<?php
/**
 * Created by Konstantinos Tsatsarounos<konstantinos.tsatsarounos@gmail.com>
 * Project Name: plegmahost-panel
 * Filename: StatusCodeEnumerator.php
 * Date: 27/3/2017
 * Time: 1:15 πμ
 */

namespace PokeApp\Http\Controllers\Api;


trait StatusCodeTrait {
	public static $ERROR = 105;
	public static $SUCCESS = 100;
	public static $NOT_FOUND = 104;
	public static $UNAUTHORIZED_REQUEST = 103;
}