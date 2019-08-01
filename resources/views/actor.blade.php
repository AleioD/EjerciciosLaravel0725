@extends('plantilla')

@section('body')

    Nombre Completo: {{ $actor->getNombreCompleto()}} <br>
    Película favorita: {{ $favMovie->title}} <br>
    Rating: {{ $actor->rating }} <br>
    <form class="" action="{{ $actor->id }}" method="post">
      @csrf
      <input type="hidden" name="id" value="{{ $actor->id }}">
      <button type="submit" class="btn btn-success">Borrar registro</button>

    </form>

@endsection
