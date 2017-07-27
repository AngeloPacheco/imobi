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

/*    HOME    */
Route::get('/painel', 'Painel\PainelController@index');
/*   CONFIGURAÇÕES  */
Route::get('/painel/configuracoes', 'Painel\ConfiguracaoController@index');
/*   EMPRESA  */
Route::resource('/painel/empresa', 'Painel\EmpresaController');
/*   CORRETORES  */
Route::resource('/painel/corretores', 'Painel\CorretorController');
Route::get('/painel/corretores/busca', 'Painel\CorretorController@busca');
Route::post('/painel/corretores/busca', 'Painel\CorretorController@busca');
Route::get('/painel/corretores/delete/{id}', 'Painel\CorretorController@destroy');
/*   CATEGORIA DE IMOVEIS  */
Route::resource('/painel/categoria-imoveis', 'Painel\CategoriaImovelController');
Route::get('/painel/categoria-imoveis/busca', 'Painel\CategoriaImovelController@busca');
Route::post('/painel/categoria-imoveis/busca', 'Painel\CategoriaImovelController@busca');
Route::get('/painel/categoria-imoveis/delete/{id}', 'Painel\CategoriaImovelController@destroy');
/*   FORMA DE PAGTO */
Route::resource('/painel/forma-de-pagamentos', 'Painel\FormaPagtoController');
Route::get('/painel/forma-de-pagamentos/busca', 'Painel\FormaPagtoController@busca');
Route::post('/painel/forma-de-pagamentos/busca', 'Painel\FormaPagtoController@busca');
Route::get('/painel/forma-de-pagamentos/delete/{id}', 'Painel\FormaPagtoController@destroy');
/*   PERFIL DE CLIENTE */
Route::resource('/painel/perfis', 'Painel\PerfilController');
Route::get('/painel/perfis/delete/{id}', 'Painel\PerfilController@destroy');
/*  CLIENTES */
Route::resource('/painel/clientes', 'Painel\ClienteController');
Route::get('/painel/clientes/busca', 'Painel\ClienteController@busca');
Route::post('/painel/clientes/busca', 'Painel\ClienteController@busca');
Route::get('/painel/clientes/delete/{id}', 'Painel\ClienteController@destroy');


Route::get('/', function () {
    return view('welcome');
});
