<?php

Route::get('/', function () {
    return view('index');
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

// Rotas de Cores
Route::prefix('/cores')->group(function () {
    Route::get('/', 'ColorController@index');
    Route::get('/criar', 'ColorController@create');
    Route::get('/{id}/detalhes', 'ColorController@show');
    Route::get('/editar/{id}', 'ColorController@edit');
    Route::post('/{id}', 'ColorController@update');
    Route::post('/deletar/{id}', 'ColorController@destroy');
});

// Rotas de Duração de Contratos
Route::prefix('/duracoes-de-contratos')->group(function () {
    Route::get('/', 'DurationContractController@index');
    Route::get('/criar', 'DurationContractController@create');
    Route::post('/', 'DurationContractController@store');
    Route::get('/{id}/detalhes', 'DurationContractController@show');
    Route::get('/editar/{id}', 'DurationContractController@edit');
    Route::post('/{id}', 'DurationContractController@update');
    Route::get('/deletar/{id}', 'DurationContractController@destroy');
});

// Rotas do Status do Pedido
Route::prefix('/status-dos-pedidos')->group(function () {
    Route::get('/', 'OrderStatusController@index');
    Route::get('/criar', 'OrderStatusController@create');
    Route::post('/', 'OrderStatusController@store');
    Route::get('/{id}/detalhes', 'OrderStatusController@show');
    Route::get('/editar/{id}', 'OrderStatusController@edit');
    Route::post('/{id}', 'OrderStatusController@update');
    Route::post('/deletar/{id}', 'OrderStatusController@destroy');
});

// Rotas do Status do Vales
Route::prefix('/status-dos-vales')->group(function () {
    Route::get('/', 'PaydayAdvanceStatusController@index');
    Route::get('/criar', 'PaydayAdvanceStatusController@create');
    Route::post('/', 'PaydayAdvanceStatusController@store');
    Route::get('/{id}/detalhes', 'PaydayAdvanceStatusController@show');
    Route::get('/editar/{id}', 'PaydayAdvanceStatusController@edit');
    Route::post('/{id}', 'PaydayAdvanceStatusController@update');
    Route::post('/deletar/{id}', 'PaydayAdvanceStatusController@destroy');
});

// Rotas dos Períodos
Route::prefix('/periodos')->group(function () {
    Route::get('/', 'PeriodController@index');
    Route::get('/criar', 'PeriodController@create');
    Route::post('/', 'PeriodController@store');
    Route::get('/{id}/detalhes', 'PeriodController@show');
    Route::get('/editar/{id}', 'PeriodController@edit');
    Route::post('/{id}', 'PeriodController@update');
    Route::post('/deletar/{id}', 'PeriodController@destroy');
});

// Rotas de Planos
Route::prefix('/planos')->group(function () {
    Route::get('/', 'PlanController@index');
    Route::get('/criar', 'PlanController@create');
    Route::post('/', 'PlanController@store');
    Route::get('/{id}/detalhes', 'PlanController@show');
    Route::get('/editar/{id}', 'PlanController@edit');
    Route::post('/{id}', 'PlanController@update');
    Route::post('/deletar/{id}', 'PlanController@destroy');
});

// Rotas de Horário de Serviços
Route::prefix('/horario-de-servicos')->group(function () {
    Route::get('/', 'ServiceHourController@index');
    Route::get('/criar', 'ServiceHourController@create');
    Route::post('/', 'ServiceHourController@store');
    Route::get('/{id}/detalhes', 'ServiceHourController@show');
    Route::get('/editar/{id}', 'ServiceHourController@edit');
    Route::post('/{id}', 'ServiceHourController@update');
    Route::post('/deletar/{id}', 'ServiceHourController@destroy');
});

// Rotas de Tipos de Remunerações
Route::prefix('/tipos-de-remuneracoes')->group(function () {
    Route::get('/', 'TypeOfRemunerationController@index');
    Route::get('/criar', 'TypeOfRemunerationController@create');
    Route::get('/{id}/detalhes', 'TypeOfRemunerationController@show');
    Route::get('/editar/{id}', 'TypeOfRemunerationController@edit');
    Route::post('/{id}', 'TypeOfRemunerationController@update');
    Route::post('/deletar/{id}', 'TypeOfRemunerationController@destroy');
});
