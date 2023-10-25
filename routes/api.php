<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BussinesUnitController;
use App\Http\Controllers\EquipmentController;



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

Route::group([
    'prefix' => 'auth'
], function ($router) {
    Route::post('login', [AuthController::class,'login']);
    Route::post('logout', [AuthController::class,'logout']);
});

Route::group([
    'prefix' => 'user'
], function ($router) {
    Route::post('/', [UserController::class,'create']);
    Route::get('/', [UserController::class,'index']);
    Route::delete('/{id}', [UserController::class,'destroy']);
});

Route::group([
    'prefix' => 'product'
], function ($router) {
    Route::get('/', [ProductController::class,'index']);
    Route::post('/', [ProductController::class,'create']);
    Route::get('/productbyuser/{id}', [ProductController::class,'productByBussinesUnitId']);
    Route::put('/{id}', [ProductController::class,'update']);
});

Route::group([
    'middleware' => 'auth:sanctum',
    'prefix' => 'bussinesunit'
], function ($router) {
    Route::get('/', [BussinesUnitController::class,'index']);
    Route::post('/', [BussinesUnitController::class,'create']);
    Route::get('/findByUser', [BussinesUnitController::class,'findByUserId']);
    Route::get('/{id}', [BussinesUnitController::class,'findById']);
    Route::delete('/{id}', [BussinesUnitController::class,'destroy']);
    Route::patch('/{id}', [BussinesUnitController::class,'update']);
});

Route::group([
    'prefix' => 'equipment'
], function ($router) {
    Route::post('/', [EquipmentController::class,'create']);
});
