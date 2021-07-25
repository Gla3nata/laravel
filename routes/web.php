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
use App\Http\Controllers\Account\IndexController as AccountController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
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

//site
Route::get('/news', [NewsController::class, 'index'])
    ->name('news');
Route::get('/news/{news}', [NewsController::class, 'show'])
    ->where('news', '\d+')
    ->name('news.show');

Route::get('session', function() {
    session(['newSession' => 'newValue']);
    if(session()->has('newSession')) {

        session()->remove('newSession');
    }

    return "Сессии нет";
});

//backoffice
Route::group(['middleware' => 'auth'], function () {
    Route::get('/account', AccountController::class)
        ->name('account');
    Route::get('/logout', function () {
        \Auth::logout();
        return redirect()->route('login');
    })->name('logout');

//admin
    Route::group(['prefix' => 'admin', 'middleware' => 'admin', 'as' => 'admin.'], function() {
        Route::view('/', 'admin.index')->name('index');
        Route::resource('news', AdminNewsController::class);
        Route::resource('categories', AdminCategoryController::class);
    });
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
