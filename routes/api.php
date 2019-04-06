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
Route::prefix('/colors')->group(function () {
    Route::get('/', 'ColorController@indexJson');
    Route::get('/{id}', 'ColorController@showJson');
});

// Rotas da Duração de Contrato
Route::prefix('/durationcontracts')->group(function () {
    Route::get('/', 'DurationContractController@indexJson');
    Route::get('/{id}', 'DurationContractController@showJson');
});

// Rotas do Status da Order
Route::prefix('/orderstatus')->group(function () {
    Route::get('/', 'OrderStatusController@indexJson');
    Route::get('/{id}', 'OrderStatusController@showJson');
});

// Rotas do Status do Vale
Route::prefix('/paydayadvancestatus')->group(function () {
    Route::get('/', 'PaydayAdvanceStatusController@indexJson');
    Route::get('/{id}', 'PaydayAdvanceStatusController@showJson');
});

// Rotas do Periodo
Route::prefix('/periods')->group(function () {
    Route::get('/', 'PeriodController@indexJson');
    Route::get('/{id}', 'PeriodController@showJson');
});

// Rotas do Plan
Route::prefix('/plans')->group(function () {
    Route::get('/', 'PlanController@indexJson');
    Route::get('/{id}', 'PlanController@showJson');
});

// Rotas do Status do Agendamento
Route::prefix('/schedulingstatus')->group(function () {
    Route::get('/', 'SchedulingStatusController@indexJson');
    Route::get('/{id}', 'SchedulingStatusController@showJson');
});

// Rota do Tipo de Remuneracao
Route::prefix('/typeofremunerations')->group(function () {
    Route::get('/', 'TypeOfRemunerationController@indexJson');
    Route::get('/{id}', 'TypeOfRemunerationController@showJson');
});

// Rotas de Admin
Route::prefix('/admins')->group(function () {
    Route::get('/', 'AdminController@indexJson');
    Route::get('/{id}', 'AdminController@showJson');
    Route::post('/', 'AdminController@storeJson');
    Route::put('/{id}', 'AdminController@updateJson');
});

// Rotas do Barbeiro
Route::prefix('/barbers')->group(function () {
    Route::get('/', 'BarberController@indexJson');
    Route::get('/{id}', 'BarberController@showJson');
    Route::post('/', 'BarberController@storeJson');
    Route::put('/{id}', 'BarberController@updateJson');
});

// Rotas da Barbearia
Route::prefix('/barbershops')->group(function () {
    Route::get('/', 'BarbershopController@indexJson');
    Route::get('/{id}', 'BarbershopController@showJson');
    Route::post('/', 'BarbershopController@storeJson');
});

// Rotas de Categoria
Route::prefix('/categories')->group(function () {
    Route::get('/', 'CategoryController@indexJson');
    Route::get('/{id}', 'CategoryController@showJson');
    Route::post('/', 'CategoryController@storeJson');
    Route::put('/{id}', 'CategoryController@updateJson');
});

// Rotas de Cliente
Route::prefix('/customers')->group(function () {
    Route::get('/', 'CustomerController@indexJson');
    Route::get('/{id}', 'CustomerController@showJson');
    Route::post('/', 'CustomerController@storeJson');
    Route::put('/{id}', 'CustomerController@updateJson');
});

// Rotas Hora de Servicos
Route::prefix('/servicehours')->group(function () {
    Route::get('/', 'ServiceHourController@indexJson');
    Route::get('/{id}', 'ServiceHourController@showJson');
    Route::get('/getperiod/{description}', 'ServiceHourController@getPeriod');
});

// Rotas de Servicos
Route::prefix('/services')->group(function () {
    Route::get('/', 'ServiceController@indexJson');
    Route::get('/{id}', 'ServiceController@showJson');
    Route::get('/barbershop/{barbershopid}', 'ServiceController@getServicesFromBarbershop');
    Route::post('/', 'ServiceController@storeJson');
    Route::put('/{id}', 'ServiceController@updateJson');
});

// Rotas de Produtos
Route::prefix('/products')->group(function () {
    Route::get('/', 'ProductController@indexJson');
    Route::get('/{id}', 'ProductController@showJson');
    Route::post('/', 'ProductController@storeJson');
    Route::put('/{id}', 'ProductController@updateJson');
});

// Rotas de Agendamentos
Route::prefix('/schedules')->group(function () {
    Route::get('/', 'SchedulingController@indexJson');
    Route::get('/{id}', 'SchedulingController@showJson');
    Route::post('/', 'SchedulingController@storeJson');
    Route::put('/{id}', 'SchedulingController@updateJson');
});

// Rotas de Pedidos
Route::prefix('/orders')->group(function () {
    Route::get('/', 'OrderController@indexJson');
    Route::get('/{id}', 'OrderController@showJson');
    Route::post('/', 'OrderController@storeJson');
    Route::put('/{id}', 'OrderController@updateJson');
});

// Rotas de Promoções
Route::prefix('/salepromotions')->group(function () {
    Route::get('/', 'SalePromotionController@indexJson');
    Route::get('/{id}', 'SalePromotionController@showJson');
    Route::post('/', 'SalePromotionController@storeJson');
    Route::put('/{id}', 'SalePromotionController@updateJson');
});

// Rotas de Contratos
Route::prefix('/barbershopagreements')->group(function () {
    Route::get('/', 'BarbershopAgreementController@indexJson');
    Route::get('/{id}', 'BarbershopAgreementController@showJson');
    Route::post('/', 'BarbershopAgreementController@storeJson');
    Route::put('/{id}', 'BarbershopAgreementController@updateJson');
});

// Rotas de Salarios
Route::prefix('/salaries')->group(function () {
    Route::get('/barber/{id}', 'SalaryController@indexJson');
    Route::get('/{id}', 'SalaryController@showJson');
});
