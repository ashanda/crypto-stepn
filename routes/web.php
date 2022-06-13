<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\KycController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BuypackageController;

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
Route::get('/redirects', [HomeController::class,'index']);

Route::resource('package', PackageController::class);
Route::resource('buy_package', BuypackageController::class);
Route::resource('kyc', KycController::class);
Route::get('/user/profile', [UserController::class,'user']);
Route::resource('user', UserController::class);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', [HomeController::class,'index']);
    
    
});
