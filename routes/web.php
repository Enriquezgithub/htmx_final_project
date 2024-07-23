<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\ChargeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\StudentController;
use App\Models\Student;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('page.index');
});

Route::get('/student', function () {
    $stud = Student::get();
    return view('student.index', compact('stud'));
})->name('student.index');

Route::get('/student/{id}', [StudentController::class, 'find']);
Route::get('/account/{id}', [AccountController::class, 'find']);

Route::get('/charge', [ChargeController::class, 'charge'])->name('charge.index');

Route::get('/account', [AccountController::class, 'account'])->name('account.index');
Route::get('/payment', [PaymentController::class, 'payment'])->name('payment.index');

Route::get('/charge/{id}', [AccountController::class, 'billing']);
Route::get('/billing-statement/{id}', [AccountController::class, 'bill']);

// Route::post('/student', [StudentController::class, 'store'])->name('student.store');