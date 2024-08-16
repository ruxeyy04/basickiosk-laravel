<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

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

// Client side
Route::get('/login',[MainController::class, 'loginpage'])->name('loginpage');
Route::get('/', [MainController::class, 'cashierpage'])->name('main.page');
Route::get('/about', [MainController::class, 'cashierAbout'])->name('main.about');
Route::get('/profile', [MainController::class, 'cashierProfile'])->name('main.profile');
Route::get('/inventory', [MainController::class, 'cashierInv'])->name('main.inventory');

// Admin

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', [MainController::class, 'adminpage'])->name('admin.adminpage');
    Route::get('/addadmin', [MainController::class, 'adminAdd'])->name('admin.addadmin');
    Route::get('/addincharge', [MainController::class, 'adminAddIncharge'])->name('admin.addincharge');
    Route::get('/orderlog', [MainController::class, 'adminOrderLog'])->name('admin.orderlog');
    Route::get('/profile', [MainController::class, 'adminProfile'])->name('admin.profile');
    Route::get('/sales', [MainController::class, 'adminSales'])->name('admin.sales');
    Route::get('/viewadmin', [MainController::class, 'adminViewAdmin'])->name('admin.viewadmin');
    Route::get('/viewcashier', [MainController::class, 'adminViewCashier'])->name('admin.viewcashier');
    Route::get('/viewincharge', [MainController::class, 'adminViewIncharge'])->name('admin.viewincharge');
    
});

Route::group(['prefix' => 'incharge'], function () {
    Route::get('/', [MainController::class, 'inchargePage'])->name('incharge.page');
    Route::get('/prodedit', [MainController::class, 'inchargeProdedit'])->name('incharge.prodedit');
    Route::get('/profile', [MainController::class, 'inchargeProfile'])->name('incharge.profile');
    Route::get('/viewproduct', [MainController::class, 'inchargeViewProduct'])->name('incharge.viewproduct');
});

