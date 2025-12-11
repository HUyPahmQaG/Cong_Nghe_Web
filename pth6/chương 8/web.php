<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController; // TODO 11: Import Controller
use App\Http\Controllers\SinhVienController;

Route::get('/sinhvien', [SinhVienController::class, 'index'])->name('sinhvien.index');
Route::post('/sinhvien', [SinhVienController::class, 'store'])->name('sinhvien.store');
// TODO 12: Thêm 2 route này
Route::get('/', [PageController::class, 'showHomepage']);
Route::get('/about', [PageController::class, 'showHomepage']);
