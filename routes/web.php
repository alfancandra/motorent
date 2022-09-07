<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MotorController;
use App\Http\Controllers\SewaController;
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
    return redirect('login');
});
Route::get('login', [LoginController::class, 'index'])->name('login.index');
Route::post('login', [LoginController::class, 'login'])->name('login.store');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

Route::group(['middleware' => ["UserLogin"], 'as' => 'login.'], function () {

    Route::resource('motor', MotorController::class);
    Route::resource('sewa', SewaController::class);

});