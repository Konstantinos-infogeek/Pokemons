<?php

namespace PokeApp\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Pokemon extends Model
{
    protected $table = 'pokemons';
    
    protected $fillable = ['id', 'name', 'api_url', 'profile'];
	
	/**
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
	
    public function highlighted(){
    	return $this->hasOne('Highlighted','pokemon_id');
    }
    
	/**
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
	 * @param $value
	 * @return mixed
	 */
	public function getProfileAttribute($value)
	{
		return \GuzzleHttp\json_decode($value);
	}
}
