<?php

namespace PokeApp\Models;

use Illuminate\Database\Eloquent\Model;

class Highlighted extends Model {
	protected $table = 'highlighted';
	
	//Appends accessors to normal queries
	//In this case to have access to pokemon's name
	protected $appends = ['name'];
	
	protected $fillable = [
		'pokemon_id',
		'height',
		'weight',
		'experience',
		'sprite'
	];
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function owner(){
		return $this->belongsTo('PokeApp\Models\Pokemon', 'pokemon_id');
	}
	
	public function getNameAttribute(){
		return $this->owner->name;
	}
}
