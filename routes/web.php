<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hi/{name}', function (string $name) {
    return "Welcome to the page, {$name}";
});
Route::get('/hi/{information}', function (string $info) {
    return "Page info, {$info}";
});
Route::get('/hi/news/{id}', function (string $id) {
    return "Новость 1, {$id}";
});
