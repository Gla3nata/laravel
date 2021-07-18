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
use App\Http\Controllers\NewsController;
use \App\Http\Controllers\WellcomeController;
use \App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;



Route::get('/', function () {
    return response()->json([
        'title' => 'Example',
        'description' => 'ExampleDescription'
    ]);
});

Route::get('/hi', function (string $name) {
    return "Welcome to the page, {$name}";
});
Route::get('/wellcome', [WellcomeController::class, 'index']);

//admin
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function() {
    Route::view('/', 'admin.index');
    Route::resource('news', AdminNewsController::class);
    Route::get( '/news/{id}', [AdminNewsController::class, 'show'])
        ->where('news', '\d+')
        ->name('news.show');

    Route::resource('categories', AdminCategoryController::class);
    Route::get( '/categories/{id}', [AdminCategoryController::class, 'show'])
        ->where('id', '\d+')
        ->name('category.show');
});

//site
Route::get('/news', [NewsController::class, 'index'])
    ->name('news');
Route::get('/news/{news}', [NewsController::class, 'show'])
    ->where('news', '\d+')
    ->name('news.show');

Route::get('collections', function() {
    $collection = collect([
        1,2,3,4,9,13,15,28,29,33,39,54
    ]);

    dd($collection->chunk(3));
});

//Route::get( '/categories', [AdminCategoryController::class, 'index']);
//Route::get( '/categories/{id}', [AdminCategoryController::class, 'show'])
//    ->where('id', '\d+')
//   ->name('category.show');

