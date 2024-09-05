<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Middleware\RedirectIfNotAdmin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\FrontendpageController;




// Route::get('/', function () {
//     return view('frontend.homepage');
// });

Route::get('/', [FrontendpageController::class, 'index'])->name('homepage');
Route::get('/home', [FrontendpageController::class, 'index']);
Route::get('/product-lists/category/{category_id}', [FrontendpageController::class, 'productList'])->name('product.list');
Route::get('/product-details/{product_id}', [FrontendpageController::class, 'productDetails'])->name('product.detail');









  





// Laravel default routes
Route::get('/dashboard', function () {
    return view('auth.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// User Login Routes
require __DIR__.'/auth.php';

// Admin Routes
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
        // Route::get('managecategory-page', [AdminController::class, 'manageCategoryPage'])->name('managecategory');
        // Route::get('manageproducts-page', [AdminController::class, 'manageProductsPage'])->name('manageproducts');
        // Route::get('managecustomer-page', [AdminController::class, 'manageCustomerPage'])->name('managecustomer');
        // Route::get('manageorder-page', [AdminController::class, 'manageOrderPage'])->name('manageorder');

        // Manage Category
        Route::get('categories', [CategoryController::class,'index'])->name('managecategory');
        Route::get('category-edit/{id}/edit', [CategoryController::class,'edit'])->name('edit-category');        
        Route::post('categories-update/{id}', [CategoryController::class,'update'])->name('update-category');
        Route::get('category-destroy/{id}/destroy', [CategoryController::class,'destroy'])->name('destroy-category');   
        
        Route::get('category-create', [CategoryController::class,'create'])->name('create-category');
        Route::post('categories-store', [CategoryController::class, 'store'])->name('create-category-store');
        Route::get('category-image/{id}', [CategoryController::class, 'image'])->name('category.image');


        //Manage Product
        // Route::get('products', [ProductController::class,'index'])->name('manageproduct');   
               
        Route::get('products', [ProductController::class, 'index'])->name('products.index');
        // Route::get('product/image/{id}', [ProductController::class, 'showImage'])->name('product.image');
        Route::get('product-edit/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');
        Route::get('product-destroy/{id}/destroy', [ProductController::class, 'destroy'])->name('product.destroy');
        Route::post('product-update/{id}', [ProductController::class, 'update'])->name('product.update');

        
        Route::get('product-create', [ProductController::class,'create'])->name('create-product');
        Route::post('product-store', [ProductController::class, 'store'])->name('create-product-store');
        Route::get('product-image/{id}', [ProductController::class, 'image'])->name('product.image');
        Route::get('/men', [ProductController::class, 'men'])->name('product.men');
        Route::get('/women', [ProductController::class, 'women'])->name('product.women');

        //Manage customer

        Route::get('customers', [CustomerController::class, 'index'])->name('customers.index');
        Route::get('customers-create', [CustomerController::class,'create'])->name('admin.customers.create');
        Route::post('customers-store', [CustomerController::class, 'store'])->name('admin.customers.store');
        Route::get('customers-edit-page/{id}/edit', [CustomerController::class, 'edit'])->name('customers.edit');
        Route::post('customers-update/{id}', [CustomerController::class, 'update'])->name('customers.update');
        Route::get('customers-destroy/{id}/destroy', [CustomerController::class, 'destroy'])->name('customers.destroy');


        //Manage orders

        Route::get('orders', [OrderController::class, 'index'])->name('orders.index');
        Route::get('orders-create', [OrderController::class,'create'])->name('admin.orders.create');
        Route::post('orders-store', [OrderController::class, 'store'])->name('admin.orders.store');
        Route::get('orders-view-page/{id}/view', [OrderController::class, 'show'])->name('orders.show');
        Route::post('orders-update/{id}', [OrderController::class, 'update'])->name('orders.update');
        Route::get('orders-destroy/{id}/destroy', [OrderController::class, 'destroy'])->name('orders.destroy');
        Route::post('/orders/change-status', [OrderController::class, 'changeStatus'])->name('orders.changeStatus');



        
    });

    

});

