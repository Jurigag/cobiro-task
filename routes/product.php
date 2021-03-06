<?php

use App\Product\Application\Middlewares\CreateProductMiddleware;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::post('/', 'ProductController@create')
    ->middleware(CreateProductMiddleware::class)
    ->name('product/create');

Route::get('/{id}', 'ProductController@show')
    ->name('product/show');
