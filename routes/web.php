<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route:method(String Route_Name, fn Function);
// Route:method(String Route_Name, String Controller);

Route::get('/', function () {
  return view('welcome');
});

Route::get('/primerRuta', function () {
	$array = ['uno', 'dos', 'tres'];
	return $array;
});

Route::get('/saludar/{nombre}/{apellido?}', function ($nombre, $apellido = null) {
	if (!$apellido) {
		return "Hola $nombre sin apellido";
	}
	return "Hola $nombre $apellido";
});

// Callback

Route::get('/test', function () {
	return view('test');
});
