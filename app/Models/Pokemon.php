<?php

namespace PokeApp\Models;

use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
    protected $table = 'pokemons';
    
    protected $fillable = ['id', 'name', 'api_url', 'profile'];
    
    public static function storeAllIf(array $data, $condition){
    	if($condition){
		    return Pokemon::insert($data);
	    }
    	return FALSE;
    }
	
	public function getProfileAttribute($value)
	{
		return \GuzzleHttp\json_decode($value);
	}
}
