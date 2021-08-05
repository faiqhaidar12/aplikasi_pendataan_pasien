<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\RekammedisController;
use App\Http\Controllers\UserController;
use App\Models\RekammedisModel;

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






Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



//hak akses untuk admin
Route::group(['middleware' => 'admin'], function(){
    Route::get('/dokter', [DokterController::class, 'index'])->name('dokter');
    Route::get('/dokter/detail/{id_dokter}', [DokterController::class, 'detail']);
    Route::get('/dokter/add', [DokterController::class, 'add']);
    Route::get('/dokter/edit/{id_dokter}', [DokterController::class, 'edit']);
    Route::get('/dokter/delete/{id_dokter}', [DokterController::class, 'delete']);
    Route::post('/dokter/update/{id_dokter}', [DokterController::class, 'update']);
    Route::post('/dokter/insert', [DokterController::class, 'insert']);

    
    
});

Route::group(['middleware' => 'dokter'], function(){
    
    
    Route::get('/pasien', [PasienController::class, 'index'])->name('pasien');
    Route::get('/pasien/add', [PasienController::class, 'add']);
    Route::get('/pasien/print', [PasienController::class, 'print']);
    Route::get('/pasien/printpdf', [PasienController::class, 'printpdf']);
    Route::get('/pasien/edit/{id_pasien}', [PasienController::class, 'edit']);
    Route::get('/pasien/delete/{id_pasien}', [PasienController::class, 'delete']);
    Route::post('/pasien/update/{id_pasien}', [PasienController::class, 'update']);
    Route::post('/pasien/insert', [PasienController::class, 'insert']);
    Route::get('/pasien/search', [PasienController::class, 'search'])->name('search');

    Route::get('/rekammedis', [RekammedisController::class, 'index']);
});


