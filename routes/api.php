<?php

use App\Http\Controllers\ProductOrderController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/saveStatus',[ProductOrderController::class,'SaveStatus']);


Route::post('/addNewOrder',[ProductOrderController::class,'add_order']);
Route::post('/OrderStatus',[ProductOrderController::class,'status']);
Route::get('/getOrder',[ProductOrderController::class,'index']);
