{{-- Para usar la plantilla template.blade.php --}}
@extends('template')

@section('pageTitle', 'Listado de Géneros')

@section('cssLink', '/css/bootstrap.min.css')

@section('mainContent')
	<!-- Listado de géneros -->
	<div class="container" style="margin-top:30px; margin-bottom: 30px;">
		<h2>Listado de generos</h2>
		<ul>
			@foreach ($genres as $genre)
				<li>
					<b>Nombre: </b> {{ $genre->name }} <br>
					<b>Películas del género:</b> <br>
					@forelse ($genre->movies as $movie)
						<i>{{ $movie->title }}</i> <br>
					@empty
						<i>No hay películas para este género</i>
					@endforelse
				</li>
			@endforeach
		</ul>
	</div>
@endsection
