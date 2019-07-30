<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Actors;

class ActorController extends Controller
{
    public function directory(){
      $actors = Actors::paginate(10);

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
}
