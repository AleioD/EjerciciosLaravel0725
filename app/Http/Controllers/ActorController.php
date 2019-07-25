<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Actors;

class ActorController extends Controller
{
    public function directory(){
      $actors = Actors::all();

      return view('actores', compact('actors'));
    }

    public function show($id){
      $actor = Actors::find($id);

      return view('actor', compact('actor'));
    }

    public function search(){
      $actorsSearch = Actors::where('first_name', '=', $_GET['search'])
      ->orderBy('first_name')
      ->get();

      return view('actores', compact('actorsSearch'));
    }
}
