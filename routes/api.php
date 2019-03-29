<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Rota da versao
Route::get('/', function () {
    return response([
        'version' => '0.0.1',
    ], 200);
});

// Rotas de Cor
Route::get('/colors', 'ColorController@indexJson');
Route::get('/colors/{id}', 'ColorController@showJson');

// Rotas da Duração de Contrato
Route::get('/durationcontracts', 'DurationContractController@indexJson');
Route::get('/durationcontracts/{id}', 'DurationContractController@showJson');

// Rotas do Status da Order
Route::get('/orderstatus', 'OrderStatusController@indexJson');
Route::get('/orderstatus/{id}', 'OrderStatusController@showJson');

// Rotas do Status do Vale
Route::get('/paydayadvancestatus', 'PaydayAdvanceStatusController@indexJson');
Route::get('/paydayadvancestatus/{id}', 'PaydayAdvanceStatusController@showJson');

// Rotas do Periodo
Route::get('/periods', 'PeriodController@indexJson');
Route::get('/periods/{id}', 'PeriodController@showJson');

// Rotas do Plan
Route::get('/plans', 'PlanController@indexJson');
Route::get('/plans/{id}', 'PlanController@showJson');

// Rotas do Status do Agendamento
Route::get('/schedulingstatus', 'SchedulingStatusController@indexJson');
Route::get('/schedulingstatus/{id}', 'SchedulingStatusController@showJson');

// Rota do Tipo de Remuneracao
Route::get('/typeofremunerations', 'TypeOfRemunerationController@indexJson');
Route::get('/typeofremunerations/{id}', 'TypeOfRemunerationController@showJson');

// Rotas de Admin
Route::get('/admins', 'AdminController@indexJson');
Route::get('/admins/{id}', 'AdminController@showJson');
Route::post('/admins', 'AdminController@storeJson');
Route::put('/admins/{id}', 'AdminController@updateJson');

// Rotas do Barbeiro
Route::get('/barbers', 'BarberController@indexJson');
Route::get('/barbers/{id}', 'BarberController@showJson');
Route::post('/barbers', 'BarberController@storeJson');
Route::put('/barbers/{id}', 'BarberController@updateJson');

// Rotas da Barbearia
Route::get('/barbershops', 'BarbershopController@indexJson');
Route::get('/barbershops/{id}', 'BarbershopController@showJson');
Route::post('/barbershops', 'BarbershopController@storeJson');

// Rotas de Categoria
Route::get('/categories', 'CategoryController@indexJson');
Route::get('/categories/{id}', 'CategoryController@showJson');
Route::post('/categories', 'CategoryController@storeJson');
Route::put('/categories/{id}', 'CategoryController@updateJson');

// Rotas de Cliente
Route::get('/customers', 'CustomerController@indexJson');
Route::get('/customers/{id}', 'CustomerController@showJson');
Route::post('/customers', 'CustomerController@storeJson');
Route::put('/customers/{id}', 'CustomerController@updateJson');

// Rotas de Servicos
Route::get('/services', 'ServiceController@indexJson');
Route::get('/services/{id}', 'ServiceController@showJson');
Route::post('/services', 'ServiceController@storeJson');
Route::put('/services/{id}', 'ServiceController@updateJson');

// Rotas de Produtos
Route::get('/products', 'ProductController@indexJson');
Route::get('/products/{id}', 'ProductController@showJson');
Route::post('/products', 'ProductController@storeJson');
Route::put('/products/{id}', 'ProductController@updateJson');
