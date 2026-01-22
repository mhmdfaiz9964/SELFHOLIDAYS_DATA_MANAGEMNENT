<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Users
    Route::get('/users', function() { return view('users.index'); })->name('users.index');
    
    // Banks
    Route::resource('banks', \App\Http\Controllers\BankController::class);

    // Reasons (AJAX store)
    Route::post('reasons', [\App\Http\Controllers\ReasonController::class, 'store'])->name('reasons.store');

    // Cheques
    Route::resource('cheques', \App\Http\Controllers\ChequeController::class);
    Route::post('cheques/{cheque}/payments', [\App\Http\Controllers\ChequePaymentController::class, 'store'])->name('cheque_payments.store');
});

require __DIR__.'/auth.php';
