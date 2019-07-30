{{-- Para usar la plantilla template.blade.php --}}
@extends('template')


@section('pageTitle', 'Crear una Película')

@section('cssLink', '/css/bootstrap.min.css')

@section('mainContent')
	<!-- Listado de peliculas -->

	<div class="container" style="margin-top:30px; margin-bottom: 30px;">
		<h2>Crear una película</h2>

		@if ($errors)
			@foreach ($errors->all() as $error)
				<p style="color: red;">{{ $error }}</p>
			@endforeach
		@endif

		<form action="/movies/create" method="post">
			{{-- Genera un input de tipo hidden con el token --}}
			{{-- {{ csrf_field() }} --}}
			@csrf

			<div class="row">

				<div class="col-6">
					<div class="form-group">
						<label>Título:</label>
						<input type="text" name="title" class="form-control" value="{{ old('title') }}">
						@error ('title')
							<i style="color: red;"> {{ $errors->first('title') }}</i>
						@enderror
					</div>
				</div>

				<div class="col-6">
					<div class="form-group">
						<label>Rating:</label>
						<input type="text" name="rating" class="form-control">
						@error ('rating')
							<i style="color: red;"> {{ $errors->first('rating') }}</i>
						@enderror
					</div>
				</div>

				<div class="col-6">
					<div class="form-group">
						<label>Premios:</label>
						<input type="text" name="awards" class="form-control">
					</div>
				</div>

				<div class="col-6">
					<div class="form-group">
						<label>Duración:</label>
						<input type="text" name="length" class="form-control">
					</div>
				</div>

				<div class="col-6">
					<div class="form-group">
						<label>Fecha de estreno:</label>
						<input type="date" name="release_date" class="form-control">
					</div>
				</div>

				<div class="col-6">
					<div class="form-group">
						<label>Género:</label>
						<select class="form-control" name="genre_id">
							<option value="">Elegí un género</option>
							@foreach ($genres as $genre)
								<option value="{{ $genre->id }}"> {{ $genre->name }}</option>
							@endforeach
						</select>
						@error ('genre_id')
							<i style="color: red;"> {{ $errors->first('genre_id') }}</i>
						@enderror
					</div>
				</div>

			</div>

			<button type="submit" class="btn btn-success">GUARDAR</button>
		</form>
	</div>
@endsection
