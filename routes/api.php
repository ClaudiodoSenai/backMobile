<?php

use App\Http\Controllers\CarrinhoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProdutoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// Rotas Produtos 
Route::get('/produtos',[ProdutoController::class,'index']);
Route::post('/produtos/store',[ProdutoController::class,'store']);
Route::get('/produtos/all',[ProdutoController::class,'retornarTodos']);
Route::post('/produtos/adicionar-carrinho', [ProdutoController::class, 'adicionarAoCarrinho']);

//Rotas Cliente 
Route::get('/cliente/index',[ClienteController::class,'indexCliente']);
Route::post('/cliente/store',[ClienteController::class,'storeCliente']);

/*Route::post('/produtos/carrinho', [CarrinhoController::class, 'store']);
Route::post('/produtos/carrinho', [CarrinhoController::class, 'retornarTodos']);*/
