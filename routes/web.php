<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/home', [
    'as' => 'home',
    'uses' => 'ReceitasController@show'
]);

Route::get('/', 'WelcomeController@index')->name('welcome');

Auth::routes();

Route::group(['prefix' => 'receitas'], function(){
    Route::get('/cadastrar', [
        'as' => 'receitas.cadastrar',
        'uses' => 'ReceitasController@create'
    ]);
    Route::get('/listar', [
        'as' => 'receitas.listar',
        'uses' => 'ReceitasController@show'
    ]);
    Route::post('/salvar', [
        'as' => 'receitas.salvar',
        'uses' => 'ReceitasController@store'
    ]);
    Route::get('/editar/{id}', [
        'as' => 'receitas.editar',
        'uses' => 'ReceitasController@edit'
    ]);
    Route::get('/visualizar/{id}', [
        'as' => 'receitas.visualizar',
        'uses' => 'ReceitasController@view'
    ]);
    Route::put('/atualizar/{id}', [
        'as' => 'receitas.atualizar',
        'uses' => 'ReceitasController@update'
    ]);
    Route::get('/excluir/{id}', [
        'as' => 'receitas.delete',
        'uses' => 'ReceitasController@delete'
    ]);
});

// Route::get('/home', 'ReceitasController@show');

Route::get('/profile', 'ProfileController@index')->name('profile');
Route::put('/profile', 'ProfileController@update')->name('profile.update');

Route::get('/about', function () {
    return view('about');
})->name('about');
