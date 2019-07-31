<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Actors;
use App\Movies;

class ActorController extends Controller
{
    public function directory(){
      $actors = Actors::orderby('first_name')->paginate(10);

      return view('actores', compact('actors'));
    }

    public function show($id){
      $actor = Actors::find($id);

      return view('actor', compact('actor'));
    }

    public function search(){
      $actors = Actors::where('first_name', '=', $_GET['search'])
      ->orWhere('last_name', '=', $_GET['search'])
      ->orderBy('last_name')
      ->paginate(2);

      return view('actores', compact('actors'));
    }

    public function add(){
      $movies = Movies::all();

      return view('add', compact('movies'));
    }

    public function store(Request $req){
      // Validamos
  		$request->validate([
  			'first_name' => 'required | string',
  			'last_name' => 'required | string',
  			'rating' => 'required | numeric | between: 0,10',
  			'favorite_movie_id' => 'required'
  		], [
  			'first_name.required' => 'El nombre es obligatorio',
  			'last_name.required' => 'El apellido es obligatorio',
  			'first_name.string' => 'El nombre debe ser de tipo texto',
  			'last_name.string' => 'El apellido debe ser de tipo texto',
  			'rating.required' => 'El rating es obligatorio',
  			'rating.numeric' => 'El rating solo admite números',
  			'rating.between' => 'El rating debe contener un número entre 0 y 10',
        'favorite_movie_id.required' => 'Debes escojer una película',
  		]);

      Movie::create([
  			'first_name' => $request['first_name'],
  			'last_name' => $request['last_name'],
        'rating' => $request['rating'],
  			'favorite_movie_id' => $request['favorite_movie_id'],
  		]);

      return redirect('/actores');
    }
}
