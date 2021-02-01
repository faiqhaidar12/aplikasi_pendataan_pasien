<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\UserController;
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

Route::get('/', [HomeController::class, 'index']);
Route::get('/dokter', [DokterController::class, 'index']);
Route::get('/dokter/detail/{id_dokter}', [DokterController::class, 'detail']);
Route::get('/pasien', [PasienController::class, 'index']);
Route::get('/user', [UserController::class, 'index']);
