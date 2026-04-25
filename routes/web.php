<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;


Route::get('/',[ProductController::class,'index']);
Route::post('/product/store',[ProductController::class,'store']);
Route::get('/product/{id}/edit',[ProductController::class,'edit']);
Route::patch('/product/{id}/update',[ProductController::class,'update']);
Route::delete('/product/{id}/destroy',[ProductController::class,'destroy']);