<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Actors;
use App\Movies;
use Auth;

class ActorController extends Controller
{
    public function directory(){
      $actors = Actors::orderby('first_name')->paginate(10);

      return view('actores', compact('actors'));
    }

    public function show($id){
      $actor = Actors::find($id);
      $favMovie = Movies::find($actor->favorite_movie_id);

      return view('actor', compact('actor', 'favMovie'));
    }

    public function search(){
      $actors = Actors::where('first_name', '=', $_GET['search'])
      ->orWhere('last_name', '=', $_GET['search'])
      ->orderBy('last_name')
      ->paginate(2);

      return view('actores', compact('actors'));
    }

    public function add(){

      if (Auth::user() == null) {
        return redirect('actores');
      }

      $movies = Movies::orderBy('title')->get();

      return view('add', compact('movies'));
    }

    public function store(Request $request){
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

      Actors::create([
  			'first_name' => $request['first_name'],
  			'last_name' => $request['last_name'],
        'rating' => $request['rating'],
  			'favorite_movie_id' => $request['favorite_movie_id'],
  		]);

      return redirect('/actores');
    }

    public function edit($id){

      if (Auth::user() == null) {
        return redirect('actores');
      }

      $movies = Movies::orderBy('title')->get();
      $actor = Actors::find($id);
      return view('actores-edit', compact('movies', 'actor'));
    }

    public function update(Request $request){

      if (Auth::user() == null) {
        return redirect('actores');
      }

      $actor = Actors::find($request['id']);

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


  			$actor->first_name = $request['first_name'];
  			$actor->last_name = $request['last_name'];
        $actor->rating = $request['rating'];
  			$actor->favorite_movie_id = $request['favorite_movie_id'];
  		  $actor->save();

        $id = $actor->id;

      return redirect('/actor/{id}');
    }

    public function destroy(Request $request){
      $actor = Actors::find($request['id']);

      if (Auth::user() == null) {
        return redirect('actores');
      }


      $actor->delete();

      return redirect('/actores');
    }
}
