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
//use Illuminate\Http\Request;
//use Auth;
Route::group(['middleware' => ['web']], function () {
Route::auth();
Route::get('/','artigosController@welcome');

Route::get('/welcome','artigosController@welcome');
Route::get('/home','artigosController@welcome');

Route::get('/artigos','artigosController@lista');
Route::get('/eventos','EventoController@lista');
Route::get('/cadastroprof','ProfessorController@cadastroprof');
Route::get('/cadastroaluno','AlunoController@cadastroaluno');
Route::post('/editarprof','ProfessorController@editarprof');
Route::post('/editaraluno','AlunoController@editaraluno');

Route::post('/edicaoartigo','artigosController@edicaoartigo');
Route::post('/edicaoevento','EventoController@edicaoevento');
Route::post('/editarartigo','artigosController@editarartigo');
Route::post('/editarevento','EventoController@editarevento');

Route::post('/deletarnotificacao','artigosController@deletarnotificacao');

Route::any('/eventos/pesquisar','EventoController@search');
Route::get('/inserirartigo','artigosController@form');
Route::post('/criarartigo','artigosController@inserirartigo');
Route::post('/autenticar','Auth\LoginController@authenticate');
Route::post('/deslogar','Auth\LoginController@logout');
Route::get('/eventos/excluir/{id}', 'EventoController@excluir');
Route::get('/artigos/excluir/{id}', 'artigosController@excluir');
Route::post('/artigos/aceitar', 'artigosController@aceitar');
Route::get('/artigos/revisados', 'artigosController@revisados');
Route::get('/artigos/revisadosadm', 'artigosController@listagemadm');
Route::post('/artigos/revisor', 'AdministradorController@indicarRevisor');
// Route::post('/registrarprof','Auth\RegisterController@createprof');
Route::get('/inserirevento','EventoController@form');
Route::post('/criarevento','EventoController@inserirevento');

 Route::get('/registerprof', function () {
     return view('auth/registerprof');
 });
// Route::post('/auth/login','Auth\LoginController@authenticate');
//Route::controller(['Auth', 'AuthController', 'Auth', 'PasswordController']);
});


