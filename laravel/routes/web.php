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

use Illuminate\Routing\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/saludo', function(){
    return view('Hola');
});

Route::get('/saludo/{name}', function($name){
    return 'Hola '.$name;
});

Route::get('/suma/{num1}/{num2}', function($num1, $num2){
    return $num1 + $num2;
}) -> where(['num1' => '[0-9]+', 'num2' => '[0-9]+']);

Routte:get('/mult/{num1}/{num2}/{num3?}', function($num1, $num2, $num3 = 1){
    return $num1 * $num2 * $num3;
});