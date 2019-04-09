<?php

Route::get('/', function () {
    return view('index');
});

Route::prefix('/cores')->group(function () {
    Route::get('/', 'ColorController@index');
    Route::get('/criar', 'ColorController@create');
});

// Rotas de Categorias
Route::prefix('/categorias')->group(function () {
    Route::get('/', 'CategoryController@index');
    Route::get('/criar', 'CategoryController@create');
    Route::post('/', 'CategoryController@store');
    Route::get('/{id}/detalhes', 'CategoryController@show');
    Route::get('/editar/{id}', 'CategoryController@edit');
    Route::post('/{id}', 'CategoryController@update');
    Route::get('/deletar/{id}', 'CategoryController@destroy');
});
