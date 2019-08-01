{{-- Para usar la plantilla template.blade.php --}}
@extends('template')

@section('pageTitle', 'Listado de Películas')

@section('cssLink', '/css/bootstrap.min.css')

@section('mainContent')
	<!-- Listado de peliculas -->
	<div class="container" style="margin-top:30px; margin-bottom: 30px;">
		<h2>Listado de Películas</h2>
		<ul>
			@foreach ($movies as $movie)
				<li>
					<b>Título: </b> {{ $movie->title }} <br>
					<b>Premios: </b> {{ $movie->awards }} <br>
					<b>Fecha de estreno: </b> {{ $movie->release_date }} <br>
					{{-- Aquí abajo pedimos la relación --}}
					{{-- <b>Género: </b> {{ $movie->genre->name ?? 'sin género' }} <br> --}}
					@if ($movie->genre)
						<b>Género: </b> {{ $movie->genre->name }} <br>
					@else
						<b>Género: </b>sin género<br>
					@endif
					<a href="{{ route('show', $movie->id) }}" class="btn btn-success">ver detalle de la película</a>
					{{-- <a href="/movies/{{ $movie->id }}" class="btn btn-success">ver detalle de la película</a> --}}
				</li>
			@endforeach
		</ul>
	</div>
@endsection
