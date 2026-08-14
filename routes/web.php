<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

/* Route::get('/', function () {
    return view('welcome'); // TODO: Remover ruta cuando se complete la página de posts
}); */

/* Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard'); */

// Rutas protegidas por autenticación
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rutas públicas
Route::group([
    'namespace' => 'App\Http\Controllers'
], function ($route) {
    $route->get('/', 'PostController@index');
    $route->resource('posts', 'PostController');

    $route->get('categories', 'CategoryController@index');
});

require __DIR__.'/auth.php';
