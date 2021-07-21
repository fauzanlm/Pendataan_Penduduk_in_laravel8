<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController as AC;
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
    return redirect('/login');
});
Route::get('/password/reset', function () {
    return redirect('/login');
});
Route::get('/register', function () {
    return redirect('/login');
});

Auth::routes([
    'password.reset' => false,
    'verify' => false,
    'password.request' => false,
    'reset'=>false,
    'register' => false
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('admin', AC::class);