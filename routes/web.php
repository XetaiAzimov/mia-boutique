<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

// Ana səhifə
Route::get('/', [ProductController::class, 'index']);

// Admin Paneli
Route::get('/admin', [ProductController::class, 'admin'])->name('admin');

// Məhsul Əməliyyatları
Route::post('/admin/add', [ProductController::class, 'store'])->name('product.store');
// Məhsul silmə (Blade-də form və DELETE metodudursa, belə qalmalıdır):
Route::delete('/admin/delete/{id}', [ProductController::class, 'destroy'])->name('product.destroy');

// İşçi Əməliyyatları
Route::post('/admin/employee', [ProductController::class, 'storeEmployee'])->name('employee.store');
// İşçi silmə (Blade-də form və DELETE metodudursa, belə qalmalıdır):
Route::delete('/admin/employee/{id}', [ProductController::class, 'destroyEmployee'])->name('employee.destroy');
