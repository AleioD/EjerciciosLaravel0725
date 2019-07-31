<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Agregar un actor</title>
    <link rel="stylesheet" href="/css/app.css">
  </head>
  <body>
    <div class="container" style="margin-top:30px; margin-bottom: 30px;">
    <form class="" action="/actores/add" method="post">
      @csrf
      <div class="row">
        <div class="col-6">
          <div class="form-group">
            <label for="">Nombre:</label>
            <input type="text" name="first_name" class="form-control" value="{{ old ('first_name') }}">
          </div>
        </div>
        <div class="col-6">
          <div class="form-group">
            <label for="">Apellido:</label>
            <input type="text" name="last_name" class="form-control" value="{{ old ('last_name') }}">
          </div>
        </div>
        <div class="col-6">
          <div class="form-group">
            <label for="">Rating:</label>
            <input type="text" name="rating" class="form-control" value="{{ old ('rating') }}">
          </div>
        </div>
        <div class="col-6">
          <div class="form-group">
            <label for="">Película favorita:</label>
            <select class="form-control" name="movie_id">
            <option value="">Elegí una película</option>
            @foreach ($movies as $movie)
              <option value="{{ $movie->id }}"> {{ $movie->title }}</option>
            @endforeach
          </select>
          </div>
        </div>

      </div>
    </form>
  </div>
  </body>
</html>
