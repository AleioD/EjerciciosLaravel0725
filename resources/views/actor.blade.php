<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Detalle actor</title>
  </head>
  <body>
    Nombre Completo: {{ $actor->getNombreCompleto()}} <br>
    Película favorita: {{ $favMovie->title}} <br>
    Rating: {{ $actor->rating }} <br>
    <form class="" action="{{ $actor->id }}" method="post">
      @csrf
      <input type="hidden" name="id" value="{{ $actor->id }}">
      <button type="submit" class="btn btn-success">Borrar registro</button>

    </form>
  </body>
</html>
