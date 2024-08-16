<?php

use App\Http\Controllers\MainController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/login', [MainController::class, 'login']);

Route::get('/get-products', [MainController::class, 'getProducts']);
Route::get('/get-sales', [MainController::class, 'getSales']);

Route::group(['prefix' => 'cashier'], function () {
    Route::post('addOrder', [MainController::class, 'addOrder']);
    Route::post('delOrder', [MainController::class, 'delOrder']);
    Route::post('purchaseAddOrder', [MainController::class, 'purchaseAddOrder']);
    Route::post('checkItem', [MainController::class, 'checkItem']);
    Route::post('payment', [MainController::class, 'payment']);
    Route::get('inventory', [MainController::class, 'getProductsData']);
});

Route::group(['prefix' => 'profile'], function () {
    Route::post('info', [MainController::class, 'getUserInfo']);
    Route::get('info', [MainController::class, 'getUserInfo']);
});

Route::group(['prefix' => 'admin'], function () {
    Route::get('get-sales', [MainController::class, 'getSales']);
    Route::get('order-logs', [MainController::class, 'getOrders']);
    Route::post('add-incharge', [MainController::class, 'addInCharge']);
    Route::get('get-incharge', [MainController::class, 'getInCharge']);
    Route::post('delete-incharge', [MainController::class, 'deleteInCharge']);

    Route::post('add-admin', [MainController::class, 'addAdmin']);
    Route::get('get-admin', [MainController::class, 'getAdmin']);
    Route::post('delete-admin', [MainController::class, 'deleteAdmin']);

    Route::post('delete-cashier', [MainController::class, 'deleteCashier']);
    Route::get('get-cashiers', [MainController::class, 'getCashiers']);
    Route::post('add-cashier', [MainController::class, 'addCashier']);
});

Route::group(['prefix' => 'incharge'], function () {
    Route::get('get-sales', [MainController::class, 'getSales']);
    Route::post('products/add', [MainController::class, 'addProduct']);
    Route::post('products/delete', [MainController::class, 'deleteProduct']);
    Route::get('products/{serialId}', [MainController::class, 'getProductById']);
    Route::post('products/update', [MainController::class, 'updateProduct']);
    Route::get('products', [MainController::class, 'getAllProducts']);
});
