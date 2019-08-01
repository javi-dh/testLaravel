{{-- Para usar la plantilla template.blade.php --}}
@extends('template')

@section('pageTitle', $movieToFind->title)

@section('cssLink', '/css/bootstrap.min.css')

@section('mainContent')
	<!-- Listado de peliculas -->
	<div class="container" style="margin-top:30px; margin-bottom: 30px;">
		<h2>Película: {{ $movieToFind->title }}</h2>
		<img src="/storage/posters/{{ $movieToFind->poster }}" width="100">
		<ul>
			<li><b>Rating:</b> {{ $movieToFind->rating }}</li>
			<li><b>Género:</b> {{ $movieToFind->genre->name }}</li>
			@if (count($movieToFind->actors) > 0)
			<li><b>Actores:</b>
				@foreach ($movieToFind->actors as $actor)
					<i>{{ $actor->getFullName() }}</i><br>
				@endforeach
			</li>
			@endif

			@auth
				{{-- @if (Auth::user()->id === $movieToFind->user_id)
				@endif --}}
				<form action="/movies/{{ $movieToFind->id }}" method="post">
					@csrf
					{{ method_field('delete') }}
					<button type="submit" class="btn btn-danger">BORRAR</button>
					<a href="{{ route('edit', $movieToFind->id) }}" class="btn btn-warning">Editar</a>
				</form>
			@endauth
		</ul>
	</div>
@endsection
