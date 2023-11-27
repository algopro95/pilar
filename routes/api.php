<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::resource('salespeople', App\Http\Controllers\API\SalespersonAPIController::class)
    ->except(['create', 'edit']);

Route::resource('products', App\Http\Controllers\API\ProductAPIController::class)
    ->except(['create', 'edit']);

Route::resource('sales', App\Http\Controllers\API\SalesAPIController::class)
    ->except(['create', 'edit']);