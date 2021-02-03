<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\AppController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('auth')->name('auth.')->group(function () {
    // Login
    Route::match(['get', 'post'], '/login',  [LoginController::class, 'login'])->name('login');

    // Register
    Route::match(['get', 'post'], '/register',  [LoginController::class, 'register'])->name('register');

    // Logout
    Route::get('/logout',  [LoginController::class, 'logout'])->name('logout');


    Route::middleware('auth')->group(function () {
        // Dashboard
        Route::get('/dashboard', [AppController::class, 'dashboard'])->name('dashboard');

        // List
        Route::match(['get', 'post'], '/list/{name}/{subname?}', [AppController::class, 'index'])->name('index');

        // Search
        Route::match(['get', 'post'], '/search/{name}/{subname?}', [AppController::class, 'search'])->name('search');

        // Form
        Route::match(['get', 'post'], '/form/{name}/{action?}/{id?}', [AppController::class, 'form'])->name('form');

        // Remove
        Route::post('/remove/{name}', [AppController::class, 'remove'])->name('remove');

        // // Category
        // Route::get('/categories', [AppController::class, 'categories'])->name('categories');

        // // Vendor
        // Route::get('/vendors', [AppController::class, 'vendors'])->name('vendors');

        // // Banners
        // Route::get('/banners', [AppController::class, 'banners'])->name('banners');

        // // News
        // Route::get('/news', [AppController::class, 'news'])->name('news');

        // // Pages
        // Route::get('/pages', [AppController::class, 'pages'])->name('pages');

        // // Orders
        // Route::get('/orders', [AppController::class, 'pages'])->name('orders');

        // // Orders
        // Route::get('/contacts', [AppController::class, 'contacts'])->name('contacts');
    });
});

Route::get('/', function () {
    return view('welcome');
});
