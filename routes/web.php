<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemoController;
use App\Http\Controllers\TrashController;

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
Route::resource('memos', MemoController::class);
Route::resource('trashes', TrashController::class);
Route::delete('/trashes/{trash}', 'TrashController@destroy')->name('trash.force_delete');
Route::patch('/trashes/{trash}', [TrashController::class, 'restore'])->name('trash.restore');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
