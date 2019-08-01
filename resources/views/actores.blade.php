@extends('plantilla')

@section('body')


    <form class="" action="/actores/buscar" method="get">
      <label for="search">Buscador de actores:</label>
      <input type="text" name="search" value="">
      <input type="submit" name="" value="Buscar">
    </form>
    <ul>
      @foreach ($actors as $oneActor)
        <li><a href="/actor/{{$oneActor['id']}}">{{ $oneActor->getNombreCompleto()}}</li></a>
      @endforeach
    </ul>
      {{ $actors->links() }}
    @if (isset($_GET['search']))
      <a href="/actores"><button type="button" name="Limpiar">Limpiar</button></a>
    @endif

  @endsection
