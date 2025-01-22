<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/veri-email', function () {
    return view('auth.verify-email');
})->middleware(['auth', 'verified'])->name('veri-email');


Route::middleware(['auth'])->group(function () {
    Route::get('/admin', function () {
        return view('dashboard'); 
    })->middleware('check.role:Administrador');
    Route::get('/proveedor', function () {
        return view('proveedor');
    })->middleware('check.role:Proveedor')->name('proveedor');    

    Route::get('/cliente', function () {
        return view('cliente');
    })->middleware('check.role:Cliente')->name('cliente');    
});


Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
    ->middleware(['auth', 'throttle:6,1'])
    ->name('verification.send');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/pedidos', function () {
    return view('auth.pedidos');
})->middleware(['auth', 'verified'])->name('pedidos');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
