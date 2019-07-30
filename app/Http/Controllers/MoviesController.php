<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Genre;
use App\Movie;

class MoviesController extends Controller
{

	public function index()
	{
		$movies = Movie::all();
		return view('movies-index', compact('movies'));
	}

	public function create()
	{
		$genres = Genre::orderBy('name')->get();
		return view('movies-create', compact('genres'));
	}

	public function store(Request $request)
	{
		// Validamos
		$request->validate([
			'title' => 'required',
			'rating' => 'required | numeric | between:0,10',
			'genre_id' => 'required',
		], [
			'title.required' => 'El título es obligatorio',
			'genre_id.required' => 'El género es obligatorio',
			'rating.required' => 'El rating es obligatorio',
			'rating.numeric' => 'El rating solo admite números',
			'rating.between' => 'El rating debe contener un número entre 0 y 10',
		]);

		// Guardar en DB

		// Forma para guardar #1
		// $movie = new Movie;
		// $movie->title = $request['title'];
		// $movie->rating = $request['rating'];
		// $movie->awards = $request['awards'];
		// $movie->length = $request['length'];
		// $movie->release_date = $request['release_date'];
		// $movie->genre_id = $request['genre_id'];
		// $movie->save();

		// Forma para guardar #2
		// Movie::create([
		// 	'title' => $request['title'],
		// 	'rating' => $request['rating'],
		// 	'awards' => $request['awards'],
		// 	'length' => $request['length'],
		// 	'release_date' => $request['release_date'],
		// 	'genre_id' => $request['genre_id']
		// ]);

		// Forma para guardar #3
		Movie::create($request->all());

		// Redireccionamos
		return redirect('/movies');
	}

	public function actorsByMovie()
	{
		$movies = Movie::all();
		return view('movies-actors', compact('movies'));
	}
}
