<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProdutoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/produtos',[ProdutoController::class,'index']);
Route::post('/produtos',[ProdutoController::class,'store']);

//Rotas Cliente 
Route::get('/cliente/index',[ClienteController::class,'indexCliente']);
Route::post('/cliente/store',[ClienteController::class,'storeCliente']);

