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

/*
	Estou criando uma Rota com o verbo HTTP GET
*/

//carrega todos os registros
Route::get('/series', 'SeriesController@index')->name('listar_series');

//redireciona para a página de criação
Route::get('/series/criar', 'SeriesController@create')->name('form_criar_serie');
Route::post('/series/criar', 'SeriesController@store');  //cadastra um novo registro no banco
Route::delete('/series/remover/{id}', 'SeriesController@destroy'); //remove um registro do banco
Route::post('/series/editar/{id}', 'SeriesController@edit');
Route::get('/series/{serieId}/temporadas', 'TemporadasController@index');
Route::get('/temporada/{temporadaId}/episodios', 'EpisodiosController@index');
Route::post('/temporada/{temporadaId}/episodios/assistir', 'EpisodiosController@assistir');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
