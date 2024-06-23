<?php

use App\Http\Controllers\AgamaController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GolonganDarahController;
use App\Http\Controllers\KeluargaController;
use App\Http\Controllers\NegaraController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\ProfileController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
  
    Route::get('/', [DashboardController::class,'index']);
    Route::get('pegawai/pdf', [PegawaiController::class,'pdf'])->name('pegawai-pdf');
    Route::resource('pegawai', PegawaiController::class);   
    Route::resource('agama', AgamaController::class);
    Route::resource('negara', NegaraController::class);
    Route::resource('darah', GolonganDarahController::class);
    Route::resource('keluarga', KeluargaController::class);
    Route::get('chart', [DashboardController::class,'chart']);
    Route::get('pegawai/pdf', [PegawaiController::class,'pdf'])->name('pegawai-pdf');
    

});

require __DIR__.'/auth.php';
