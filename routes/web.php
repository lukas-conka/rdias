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
    return view('index');
});
Route::get('/api/fornecedor/{id?}', 'FornecedorController@index');
Route::post('/api/fornecedor', 'FornecedorController@store');
Route::post('/api/fornecedor/{id}', 'FornecedorController@update');
Route::delete('/api/fornecedor/{id}', 'FornecedorController@delete');