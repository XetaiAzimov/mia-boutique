<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

// Ana səhifə
Route::get('/', [ProductController::class, 'index']);

// Admin Paneli
Route::get('/admin', [ProductController::class, 'admin'])->name('admin');

// Məhsul Əməliyyatları
Route::post('/admin/add', [ProductController::class, 'store'])->name('product.store');
// Bura GET etdik:
Route::get('/admin/delete/{id}', [ProductController::class, 'destroy'])->name('product.destroy');

// İşçi Əməliyyatları
Route::post('/admin/employee', [ProductController::class, 'storeEmployee'])->name('employee.store');
// Bura da GET etdik:
Route::get('/admin/employee/delete/{id}', [ProductController::class, 'destroyEmployee'])->name('employee.destroy');
