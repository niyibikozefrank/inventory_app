<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\StockInController;
use App\Http\Controllers\StockOutController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
});

// Admin authenticated routes
Route::middleware(['auth', 'verified'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Resources
    Route::resource('products', ProductController::class);
    Route::resource('suppliers', SupplierController::class);
    Route::resource('stockins', StockInController::class, ['except' => ['edit', 'update', 'destroy']]);
    Route::resource('stockouts', StockOutController::class, ['except' => ['edit', 'update', 'destroy']]);
    Route::resource('users', UserController::class);

    // Reports
    Route::get('/reports/inventory', [ReportController::class, 'inventory'])->name('reports.inventory');
    Route::get('/reports/stock-in', [ReportController::class, 'stockIn'])->name('reports.stockin');
    Route::get('/reports/stock-out', [ReportController::class, 'stockOut'])->name('reports.stockout');
    Route::get('/reports/low-stock', [ReportController::class, 'lowStock'])->name('reports.lowstock');
    Route::get('/reports/fast-moving', [ReportController::class, 'fastMoving'])->name('reports.fastmoving');
});

require __DIR__.'/auth.php';
