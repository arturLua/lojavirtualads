<?php

use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SuppliersController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

// rota pública — página inicial com listagem de produtos
Route::get('/', [WelcomeController::class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // rotas de produtos
    Route::get('/products/new', [ProductsController::class, 'create']);
    Route::post('/products/new', [ProductsController::class, 'store']);

    Route::get('/products', [ProductsController::class, 'index']);

    Route::get('/products/update/{id}', [ProductsController::class, 'edit']);
    Route::post('/products/update/', [ProductsController::class, 'update']);

    Route::get('/products/delete/{id}', [ProductsController::class, 'destroy']);

    // rotas de fornecedores
    Route::get('/suppliers/new', [SuppliersController::class, 'create']);
    Route::post('/suppliers/new', [SuppliersController::class, 'store']);

    Route::get('/suppliers', [SuppliersController::class, 'index']);

    Route::get('/suppliers/update/{id}', [SuppliersController::class, 'edit']);
    Route::post('/suppliers/update/', [SuppliersController::class, 'update']);

    Route::get('/suppliers/delete/{id}', [SuppliersController::class, 'destroy']);
});

require __DIR__ . '/auth.php';
