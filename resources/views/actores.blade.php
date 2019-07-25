<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Lista de Actores</title>
  </head>
  <body>
    <form class="" action="/actores/buscar" method="get">
      <label for="search">Buscador de actores:</label>
      <input type="text" name="search" value="">
      <input type="submit" name="" value="Buscar">
    </form>
    <ul>
      @foreach ($actors as $oneActor)
        <li><a href="/actor/{{$oneActor['id']}}">{{ $oneActor->getNombreCompleto()}} <br></li></a>
      @endforeach
    </ul>
  </body>
</html>
