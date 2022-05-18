<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminController;
use App\Http\Controllers\ProductController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register',[adminController::class,'register']); 
Route::post('/Login',[adminController::class,'Login']); 
Route::post('/addproduct',[ProductController::class,'create']); 
Route::get('/AllProductdetails/{id}',[ProductController::class,'AllProductdetails']); 
Route::delete('/product/{id}',[ProductController::class,'DeleteProduct']); 
Route::post('/product/{id}',[ProductController::class,'UpdateProduct']); 
Route::get('/product/{id}',[ProductController::class,'signleProduct']); 
Route::get('/search_products',[ProductController::class,'searchProduct']); 