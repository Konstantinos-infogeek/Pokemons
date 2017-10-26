<?php

namespace PokeApp\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

/**
 * Class Pokemon
 *
 * @package PokeApp\Models
 */
class Pokemon extends Model
{
    protected $table = 'pokemons';
    protected $fillable = ['id', 'name', 'api_url', 'profile'];
	
	/**
	 * Allows saving of multiple values to database if the given condition is true
	 *
	 * @param array $data
	 * @param $condition
	 * @return bool
	 */
    public static function storeAllIf(array $data, $condition){
    	if($condition){
		    return Pokemon::insert($data);
	    }
    	return FALSE;
    }
	
	/**
	 * Defines relation with the pokemon_id attribute of the Highlighted Model
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasOne
	 */
    public function highlighted(){
    	return $this->hasOne('Highlighted','pokemon_id');
    }
    
	/**
	 * Selects the bigger pokemons who have the front sprite available
	 *
	 * @return mixed
	 */
    public static function getHighLighted(){
	    return Cache::remember('highlighted', 20, function (){
		    return Pokemon::where([
			    ['profile->height', '>=', '50'],
			    ['profile->sprites', '<>', null],
		    ])->where('profile->sprites->front_default', '<>', null)->get();
	    });
    }
	
	/**
	 * Makes the profile attribute available as an object, in some cases
	 * Laravel do this automatically, but in other cases not, so
	 * it's better to define it!
	 *
	 * @param $value
	 * @return mixed
	 */
	public function getProfileAttribute($value)
	{
		return \GuzzleHttp\json_decode($value);
	}
}
