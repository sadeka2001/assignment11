<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;




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


Auth::routes();
Route::group(['middleware' => ['auth','isAdmin']], function () {
    Route::get('dashboard',[DashboardController::class,'dashboard'])->name('backend.dashboard');
    Route::resource('product', ProductController::class);
    Route::get('card',[DashboardController::class,'card'])->name('backend.card');
    Route::get('product/sale/{productId}',[ProductController::class,'product_sale'])->name('product.sale');
    Route::post('product/sale/update/{productId}',[ProductController::class,'product_sale_update'])->name('product.sale.update');

    Route::get('sales/report',[ProductController::class,'sales'])->name('sales.report');
    });

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
