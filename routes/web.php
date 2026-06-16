<?php

use Illuminate\Support\Facades\Route;

/* Route::get('/', function () {
    return view('welcome');
}); */

Route::group([
    'namespace' => 'App\Http\Controllers'
], function ($route) {
    $route->get('/', 'PostController@index');
});
