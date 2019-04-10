<?php

Route::get('/', function () {
    return view('index');
});

// Rotas de Cores
Route::prefix('/cores')->group(function () {
    Route::get('/', 'ColorController@index');
    Route::get('/criar', 'ColorController@create');
    Route::get('/{id}/detalhes', 'ColorController@show');
    Route::get('/editar/{id}', 'ColorController@edit');
    Route::post('/{id}', 'ColorController@update');
});

// Rotas de Categorias
Route::prefix('/categorias')->group(function () {
    Route::get('/', 'CategoryController@index')->name('categoryindex');
    Route::get('/criar', 'CategoryController@create');
    Route::post('/', 'CategoryController@store');
    Route::get('/{id}/detalhes', 'CategoryController@show');
    Route::get('/editar/{id}', 'CategoryController@edit');
    Route::post('/{id}', 'CategoryController@update');
    Route::get('/deletar/{id}', 'CategoryController@destroy');
});

// Rotas de Duração de Contratos
Route::prefix('/duracoescontratos')->group(function () {
    Route::get('/', 'DurationContractController@index');
});
