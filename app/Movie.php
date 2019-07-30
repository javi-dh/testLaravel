<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
	// Especificamos las columnas que podemos escribir
	protected $fillable = ['title', 'rating', 'awards', 'length', 'release_date', 'genre_id'];

	// Especificamos las columnas que están protegidas
	protected $guarded = ['id'];

	public function genre()
	{
		return $this->belongsTo(Genre::class);
	}

	public function actors()
	{
		return $this->belongsToMany(Actor::class);
	}
}
