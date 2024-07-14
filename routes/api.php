<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\ChargeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/student', [StudentController::class, 'index']);
Route::post('/student', [StudentController::class, 'store']);

Route::get('/account', [AccountController::class, 'index']);
Route::post('/account', [AccountController::class, 'store']);

Route::get('/charge', [ChargeController::class, 'index']);
Route::post('/charge', [ChargeController::class, 'store']);

Route::get('/payment', [PaymentController::class, 'index']);
Route::post('/payment', [PaymentController::class, 'store']);
