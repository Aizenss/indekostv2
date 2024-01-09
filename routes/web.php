<?php

use App\Http\Controllers\KamarkamiController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    // Route::get('/kelolaowner', [ProfileController::class, 'edit'])->name('profile.edit');
});
Route::get('/approvaladmin', function () {
    return view('admin.approvaladmin');
});
Route::get('/transaksiowner', function () {
    return view('admin.transaksiowner');
});
Route::get('/kelolaowner', function () {
    return view('admin.kelolaowner');
});

Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/kamarkami', [KamarkamiController::class, 'index'])->name('kamarkami');
});

Route::middleware(['auth', 'role:owner'])->group(function () {
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
});

require __DIR__ . '/auth.php';
