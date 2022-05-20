<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\ProductCategoryController;

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

Route::middleware('auth:sanctum')->group(function () {
    Route::get('user', [UserController::class, 'fetch']);
    Route::post('user', [UserController::class, 'updateProfile']);
    Route::post('logout', [UserController::class, 'logout']);


});

Route::post('add-products', [ProductController::class, 'addProduct']);
Route::get('get-all-products', [ProductController::class, 'All']);
Route::get('get-popular-products', [ProductController::class, 'getShoesPopular']);

Route::post('add-category', [ProductCategoryController::class, 'addCategory']);
Route::get('get-category', [ProductCategoryController::class, 'getAll']);

Route::post('login', [UserController::class, 'login']);
Route::post('register', [UserController::class, 'register']);
