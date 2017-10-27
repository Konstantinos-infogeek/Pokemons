<?php

namespace PokeApp\Models;

use Illuminate\Database\Eloquent\Model;

class Highlighted extends Model {
	protected $table = 'highlighted';
	
	//Appends accessors to normal queries
	//In this case to have access to pokemon's name
	protected $appends = ['name', 'statTotal'];
	
	protected $fillable = [
		'pokemon_id',
		'height',
		'weight',
		'experience',
		'sprite'
	];
	
	/**
	 * @param $percent
	 */
	public static function getMostPowerfull($percent = 10){
		$result = collect();
		
		if(is_numeric($percent)){
			$pokemons = Highlighted::all()->sortByDesc('statTotal');
			$limit = round($pokemons->count() * ($percent/100));
			
			$result = $pokemons->take($limit);
		}
		return $result;
	}
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function owner(){
		return $this->belongsTo('PokeApp\Models\Pokemon', 'pokemon_id');
	}
	
	public function getNameAttribute(){
		return $this->owner->name;
	}
	
	public function getStatTotalAttribute(){
		return $this->owner->statTotal;
	}
}
