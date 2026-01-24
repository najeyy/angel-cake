<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\BespokeSectionController; // <-- TAMBAHKAN INI

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');

// Admin Auth Routes
Route::prefix('admin')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout'])->name('admin.logout');
});

// Protected Admin Routes - tanpa middleware
Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    
    // Product Routes
    Route::post('/products', [ProductController::class, 'store'])->name('admin.products.store');
    Route::put('/products/{id}', [ProductController::class, 'update'])->name('admin.products.update');
    Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('admin.products.destroy');
    Route::post('/products/{id}/toggle-featured', [ProductController::class, 'toggleFeatured'])->name('admin.products.toggle-featured');
    Route::post('/products/update-order', [ProductController::class, 'updateOrder'])->name('admin.products.update-order');
    
    // Review Routes
    Route::post('/reviews', [ReviewController::class, 'store'])->name('admin.reviews.store');
    Route::put('/reviews/{id}', [ReviewController::class, 'update'])->name('admin.reviews.update');
    Route::delete('/reviews/{id}', [ReviewController::class, 'destroy'])->name('admin.reviews.destroy');
    Route::post('/reviews/{id}/toggle-status', [ReviewController::class, 'toggleStatus'])->name('admin.reviews.toggle-status');

    // Bespoke Sections Routes
    Route::get('/bespoke-sections', [BespokeSectionController::class, 'index'])->name('admin.bespoke-sections.index');
    Route::get('/bespoke-sections/create', [BespokeSectionController::class, 'create'])->name('admin.bespoke-sections.create');
    Route::post('/bespoke-sections', [BespokeSectionController::class, 'store'])->name('admin.bespoke-sections.store');
    Route::get('/bespoke-sections/{bespokeSection}/edit', [BespokeSectionController::class, 'edit'])->name('admin.bespoke-sections.edit');
    Route::put('/bespoke-sections/{bespokeSection}', [BespokeSectionController::class, 'update'])->name('admin.bespoke-sections.update');
    Route::delete('/bespoke-sections/{bespokeSection}', [BespokeSectionController::class, 'destroy'])->name('admin.bespoke-sections.destroy');
});