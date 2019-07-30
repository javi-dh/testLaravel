{{-- Para usar la plantilla template.blade.php --}}
@extends('template')

@section('pageTitle', 'Películas y actores')

@section('cssLink', '/css/bootstrap.min.css')

@section('mainContent')
	<!-- Listado de peliculas -->
	<div class="container" style="margin-top:30px; margin-bottom: 30px;">
		<h2>Listado de Películas</h2>
		<ul>
			@foreach ($movies as $movie)
				<li>
					<b>Título: </b> {{ $movie->title }} <br>
					<b>Género: </b> {{ $movie->genre->name ?? 'sin género' }} <br>
					<b>Actores de esta película:</b> <br>
					@forelse ($movie->actors as $actor)
						<i>{{ $actor->getFullName() }}</i> <br>
					@empty
						<i>No tiene actores relacionados</i>
					@endforelse
				</li>
			@endforeach
		</ul>
	</div>
@endsection
