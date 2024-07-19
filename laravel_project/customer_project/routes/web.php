<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;






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
    return view('welcome');
});


Route::get('/register', [UserController::class, 'showRegistrationForm']);
Route::post('/register', [UserController::class, 'register'])->name('register');

Route::get('/login', [UserController::class, 'showLoginForm']);
Route::post('/login', [UserController::class, 'login'])->name('login');

Route::post('/logout', [UserController::class, 'logout'])->name('logout');
// Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

// Admin routes
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::resource('admin/products', AdminProductController::class, ['as' => 'admin']);

   
});
// User routes
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
    Route::get('/dashboard', [ProductController::class, 'index'])->name('user.dashboard');
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::resource('products', ProductController::class)->only(['index', 'show']);

    Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
    Route::post('/cart/{product}', [CartController::class, 'addItem'])->name('cart.addItem');
    Route::get('/cart', [CartController::class, 'view'])->name('cart.view');
    Route::get('/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
    Route::post('/checkout', [OrderController::class, 'placeOrder'])->name('cart.placeOrder');
    
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');
    Route::post('order/place', [OrderController::class, 'placeOrder'])->name('order.place');
    Route::get('orders', [OrderController::class, 'index'])->name('orders.index');
    
    Route::resource('products', ProductController::class);
    Route::get('order/create', [OrderController::class, 'create'])->name('order.create');
    
    // Cart Routes
    Route::get('cart', [CartController::class, 'view'])->name('cart.view');
    // Route::post('cart/add/{id}', [CartController::class, 'addItem'])->name('cart.addItem');
    // Route::get('cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
});








  






























