<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SobreController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ItemPedidoController;


Route::post('pedidos/{pedido}/itens-json', [ItemPedidoController::class, 'storeJson'])
    ->name('pedidos.itens.storeJson');

Route::delete('pedidos/{pedido}/itens-json/{itemPedido}', [ItemPedidoController::class, 'destroyJson'])
    ->name('pedidos.itens.destroyJson');

Route::middleware(['auth'])->group(function () {
    Route::resource('pedidos', PedidoController::class);


});


Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');
    
Route::get('/dashboard', [AuthController::class, 'dashboard'])
    ->name('dashboard');
    
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/sobre', [SobreController::class, 'index'])->name('sobre');
Route::get('/contato', [ContatoController::class, 'index'])->name('contato');
Route::resource('categorias', CategoriaController::class);
Route::resource('produtos', ProdutoController::class);

Route::middleware(['auth', 'gerente'])->group(function () {
    Route::resource('categorias', CategoriaController::class);
});

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form')->middleware('guest');
Route::post('/register', [AuthController::class, 'register'])->name('register')->middleware('guest');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout')
    ->middleware('auth');

Route::middleware(['auth'])->group(function () {
    Route::view('/dashboard', 'auth.dashboard')->name('dashboard');
    Route::resource('produtos', ProdutoController::class);
});