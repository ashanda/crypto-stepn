<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\KycController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BuypackageController;
use App\Http\Controllers\UserbuypackageController;
use App\Http\Controllers\WalletController;


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

Route::get('/redirects', [HomeController::class,'index'])->middleware(['auth','verified']);
Route::get('/dashboard', [HomeController::class,'index'])->middleware(['auth','verified']);

Route::resource('package', PackageController::class)->middleware(['auth','verified']);
Route::resource('buy_package', BuypackageController::class)->middleware(['auth','verified']);
Route::get('buy_package/{id}/progress',[BuypackageController::class,'buy'])->middleware(['auth','verified']);
Route::get('active_packages', [BuypackageController::class,'active']);
Route::get('/user/profile', [UserController::class,'user'])->middleware(['auth','verified']);

Route::resource('user_buy_package', UserbuypackageController::class)->middleware(['auth','verified']);


Route::resource('kyc', KycController::class)->middleware(['auth','verified']);

Route::get('/user/profile', [UserController::class,'user'])->middleware(['auth','verified']);
Route::resource('user', UserController::class)->middleware(['auth','verified']);

Route::resource('wallet', WalletController::class)->middleware(['auth','verified']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/redirects', [HomeController::class,'index']);
    
    
});
