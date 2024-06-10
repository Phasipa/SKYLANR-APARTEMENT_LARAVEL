<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\WelcomeController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/catalog', [CatalogController::class, 'index']);
Route::get('/catalog/tambah', [CatalogController::class, 'create']);
Route::post('/catalog/store', [CatalogController::class, 'store']);
Route::get('/catalog/edit/{id}', [CatalogController::class, 'edit']);
Route::put('/catalog/update/{id}', [CatalogController::class, 'update']);
Route::get('/catalog/hapus/{id}', [CatalogController::class, 'delete']);
Route::get('/catalog/destroy/{id}', [CatalogController::class, 'destroy']);

Route::post('/Order', [WelcomeController::class, 'CreateTransaction'])->name('transaction');
Route::get('/transaction', [TransactionController::class, 'index']);
Route::get('/', [WelcomeController::class, 'index']);

Route::get('/transaction/cetak', [TransactionController::class, 'cetak']);