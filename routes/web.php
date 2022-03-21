<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SimulasiController;
use App\Http\Controllers\BukusimulasiController;
use App\Http\Controllers\Simulasi49Controller;
use App\Http\Controllers\PembeliController;


Route::get('/home', [HomeController::class,'index'])->name('home');
Route::get('/', [LoginController::class,'index']);
Route::post('/logout', [LoginController::class,'logout']);
Route::resource('paket',PaketController::class);
Route::get('/simulasi', [SimulasiController::class,'index']);
Route::get('/member', [MemberController::class,'index']);
Route::get('/pembeli', [PembeliController::class,'index']);
Route::get('/bukusimulasi', [BukusimulasiController::class,'index']);
Route::get('/simulasi49', [Simulasi49Controller::class,'index']);
Route::get('/export/outlet', [OutletController::class,'exportData'])->name('export-outlet');
Route::post('outlet/import', [OutletController::class,'importData'])->name('import-outlet');
Route::get('/member/export_excel', [MemberController::class,'export_excel']);
Route::post('/member/import_excel', [MemberController::class,'import_excel']);


Route::get('/member', [MemberController::class,'index']);
Route::post('/member/create', [MemberController::class,'store']);
Route::post('/member/update/{id}', [MemberController::class,'update']);
Route::post('/member/delete/{id}', [MemberController::class,'destroy']);

Route::get('/outlet', [OutletController::class,'index']);
Route::post('/outlet/create', [OutletController::class,'store']);
Route::post('/outlet/update/{id}', [OutletController::class,'update']);
Route::post('/outlet/delete/{id}', [OutletController::class,'destroy']);

Route::get('/pembeli', [PembeliController::class,'index']);
Route::post('/pembeli/create', [PembeliController::class,'store']);
Route::post('/pembeli/update/{id}', [PembeliController::class,'update']);
Route::post('/pembeli/delete/{id}', [PembeliController::class,'destroy']);

Route::get('/paket', [PaketController::class,'index']);
Route::post('/paket/create', [PaketController::class,'store']);
Route::post('/paket/update/{id}', [PaketController::class,'update']);
Route::post('/paket/delete/{id}', [PaketController::class,'destroy']);

Route::get('/buku', [BukuController::class,'index']);
Route::post('/buku/create', [BukuController::class,'store']);
Route::post('/buku/update/{id}', [BukuController::class,'update']);
Route::post('/buku/delete/{id}', [BukuController::class,'destroy']);

Route::get('/login', [LoginController::class,'index'])->name('login');
Route::post('/login', [LoginController::class,'authenticate']);
