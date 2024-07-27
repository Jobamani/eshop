<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Middleware\RedirectIfNotAdmin;
use Illuminate\Support\Facades\Route;




Route::get('/', function () {
    return view('welcome');
});





  





// Laravel default routes
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// User Login Routes
require __DIR__.'/auth.php';


Route::prefix('admin')->group(function () {
    // Routes that don't require authentication
    Route::get('login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('login', [AdminAuthController::class, 'login']);

    // Apply middleware to routes that require admin authentication
    Route::middleware(['auth:admin', RedirectIfNotAdmin::class])->group(function () {
        Route::post('logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

        // Admin Dashboard and other protected routes
        Route::get('dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
        Route::get('load-blank-page', [AdminController::class, 'loadBlankPage']);
        Route::get('category-page', [AdminController::class, 'categoryPage']);
        Route::get('myprofile-page', [AdminController::class, 'myProfilePage'])->name('myprofile');
        Route::get('managecategory-page', [AdminController::class, 'manageCategoryPage'])->name('managecategory');
        Route::get('manageproducts-page', [AdminController::class, 'manageProductsPage'])->name('manageproducts');
        Route::get('managecustomer-page', [AdminController::class, 'manageCustomerPage'])->name('managecustomer');
        Route::get('manageorder-page', [AdminController::class, 'manageOrderPage'])->name('manageorder');
    });
});