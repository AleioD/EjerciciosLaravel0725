<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Lista de Actores</title>
  </head>
  <body>
    <ul>
      @foreach ($actorsSearch as $oneActor)
        <li><a href="/actor/{{$oneActor['id']}}">{{ $oneActor->getNombreCompleto()}}</li></a>
      @endforeach
    </ul>
  </body>
</html>
