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

Route::get('/', function () {
    return view('welcome');
});

Route::group([
        'prefix' => '/pokemons',
    ], function() {
        Route::get('/',   	'PokemonController@index');
        Route::get('/{id}', 'PokemonController@show');
    }
);

Route::group([
        'prefix' => '/types',
    ], function() {
        Route::get('/',   	'TypeController@index');
        Route::get('/{id}', 'TypeController@show');
    }
);