<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Agregar un actor</title>
    <link rel="stylesheet" href="/css/app.css">
  </head>
  <body>
    @if ($errors)
			@foreach ($errors->all() as $error)
				<p style="color: red;">{{ $error }}</p>
			@endforeach
		@endif
    <div class="container" style="margin-top:30px; margin-bottom: 30px;">
    <form class="" action="/actores/add" method="post">
      @csrf
      <div class="row">
        <div class="col-6">
          <div class="form-group">
            <label for="">Nombre:</label>
            <input type="text" name="first_name" class="form-control" value="{{ $actor->first_name }}">
          </div>
        </div>
        <div class="col-6">
          <div class="form-group">
            <label for="">Apellido:</label>
            <input type="text" name="last_name" class="form-control" value="{{ $actor->last_name }}">
          </div>
        </div>
        <div class="col-6">
          <div class="form-group">
            <label for="">Rating:</label>
            <input type="text" name="rating" class="form-control" value="{{ $actor->rating }}">
          </div>
        </div>
        <div class="col-6">
          <div class="form-group">
            <label for="">Película favorita:</label>
            <select class="form-control" name="favorite_movie_id">
            @foreach ($movies as $movie)
              <option value="{{ $movie->id }}"
                @if ($movie->id == $actor->favorite_movie_id)
                  selected
                @endif
                >{{ $movie->title }}</option>
            @endforeach
          </select>
          </div>
        </div>
        	<button type="submit" class="btn btn-success">GUARDAR</button>
      </div>
    </form>
  </div>
  </body>
</html>
