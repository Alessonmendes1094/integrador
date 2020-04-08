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

Route::get('/Importar_Produtos',                 ['as'=>'produtos.index',      'uses'=>'ProdutoController@index']);
Route::post('/Importar_Produtos/salvar',         ['as'=>'produtos.salvar',     'uses'=>'ProdutoController@salvar'])->middleware('auth');

Route::get('/Exportar_Precos',                   ['as'=>'precos.index',      'uses'=>'PrecoController@index']);
Route::post('/Exportar_Produtos/salvar',         ['as'=>'precos.salvar',     'uses'=>'PrecoController@salvar'])->middleware('auth');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
