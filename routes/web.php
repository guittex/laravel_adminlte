<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function(){
    return view("index");
});

Route::controller(ProdutoController::class)->group(function () {
    Route::get('/produtos', 'index');
    Route::get('/produtos/view/{id}', 'view');
    Route::match(['get', 'post'], '/produtos/edit/{id}', 'edit')->name("produto.edit");
    Route::match(['get', 'post'], 'produtos/add', 'add')->name("produto.add");
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
