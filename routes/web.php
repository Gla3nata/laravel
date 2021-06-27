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
$array = array("Нововсть главная", "Нововсть запасная", "Нововсть дополнительная");

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hi/{name}', function (string $name) {
    return "Welcome to the page, {$name}";
});
Route::get('/information', function () {
    return "Page info";
});
Route::get('/news/{id}', function (int $id) use ($array) {
    if (sizeof($array) <= $id) {
        return "Мы уже даелаем эту новость, загляните завтра.";
    } else {
        return $array[$id];
    }

});

Route::get('/news', function () use ($array) {
    return implode("<br/>", $array);
});
