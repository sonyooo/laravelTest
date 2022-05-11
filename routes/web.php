<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Store\InctrumentController;
use App\Http\Controllers\ReviewContoller;
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

/*Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::group(['namespace' => 'Store', 'prefix' => 'store'], function() {
//   Route::resource('posts', '\App\Http\Controllers\Store\InctrumentController')->names('store.posts');
//});

$gropuData = [
    'namespace' => 'Store\Admin',
    'prefix' => 'admin/store'
];
Route::group($gropuData, function() {
    Route::resource('posts', '\App\Http\Controllers\Store\Admin\InstrumentController')
        ->names('store.admin.posts');
});
Route::post('/admin/store/posts/create', [App\Http\Controllers\Store\Admin\InstrumentController::class, 'saveFile'])->name('store.admin.posts.saveFile');


$reviewData = [
    'prefix' => 'store/comment'
];
Route::group($reviewData, function() {
    $methods = ['index', 'edit', 'update', 'store'];
    Route::resource('posts', 'App\Http\Controllers\ReviewController')
        ->only($methods)
        ->names('store.comment');
});
Route::get('/admin/store/posts/create/{instrument_id}', [App\Http\Controllers\ReviewController::class, 'create'])->name('store.comment.create');
