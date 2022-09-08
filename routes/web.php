<?php

use App\Http\Controllers\ClientListController;
use App\Http\Controllers\ClientsDeliveriesController;
use App\Http\Controllers\InactiveClientsController;
use App\Http\Controllers\LastOrdersController;
use App\Http\Controllers\OrderTypesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::controller(ClientListController::class)->group(function () {
        Route::get('/clients-list', 'index');
        Route::post('/clients-list/address', 'show')->name('clients-list');
        Route::post('/clients-list/deliveries', 'redirect')->name('deliveries');
    });

Route::get('/clients-deliveries', [ClientsDeliveriesController::class, 'index']);

Route::get('/order-type-report', [OrderTypesController::class, 'index']);

Route::get('/last-orders-report', [LastOrdersController::class, 'index']);

Route::get('/inactive-clients-report', [InactiveClientsController::class, 'index']);


