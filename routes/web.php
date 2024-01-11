<?php

use App\Http\Controllers\ApprovalAdminController;
use App\Http\Controllers\ApprovalOwnerController;
use App\Http\Controllers\KamarkamiController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\OwnerKosController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DetailKostController;
use App\Http\Controllers\KelolaAdminController;
use App\Http\Controllers\TransaksiAdminController;
use App\Http\Controllers\KelolaOwnerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KamarOwnerController;
use App\Models\Kamarkami;

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
    Route::get('/approvaladmin', [ApprovalAdminController::class, 'index'])->name('admin.approvaladmin');
    Route::patch('/approvaladmin/setuju/{kos}', [ApprovalAdminController::class, 'setuju'])->name('admin.approvaladmin.setuju');
    Route::patch('/approvaladmin/tolak/{kos}', [ApprovalAdminController::class, 'tolak'])->name('admin.approvaladmin.tolak');
    Route::get('/transaksiowner', [TransaksiAdminController::class, 'index'])->name('admin.transaksiowner');
    Route::get('/kelolaowner', [KelolaAdminController::class, 'index'])->name('admin.kelolaowner');
    Route::get('/admin-kelolaowner', [KelolaOwnerController::class, 'index'])->name('kelola-admin');
    Route::get('/admin-kelolaowner/{owner}', [KelolaOwnerController::class, 'show'])->name('kelolaowner.show');
    Route::get('/admin-kelolaowner/{owner}/delete', [KelolaOwnerController::class, 'delete'])->name('kelolaowner.delete');
});

Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/kamarkami', [KamarkamiController::class, 'index'])->name('user.kamarkami');
    Route::get('/detail-kost/{kos}', [DetailKostController::class, 'index'])->name('user.detailkost');
});

Route::middleware(['auth', 'role:owner'])->group(function () {
    Route::get('/dashboard/owner', [OwnerController::class, 'index'])->name('owner.dashboard');
    Route::get('/approval/owner', [ApprovalOwnerController::class, 'index'])->name('owner.approval');

    Route::prefix('kos')->group(function () {
        Route::get('owner', [OwnerKosController::class, 'index'])->name('owner.kos');
        Route::get('owner/create', [OwnerKosController::class, 'tambah'])->name('owner.kos.create');
        Route::post('owner/create/proses', [OwnerKosController::class, 'tambahProses'])->name('owner.kos.create.proses');
        Route::get('owner/edit/{id}', [OwnerKosController::class, 'ubah'])->name('owner.kos.edit');
        Route::put('owner/edit/proses/{id}', [OwnerKosController::class, 'ubahProses'])->name('owner.kos.edit.proses');
        Route::delete('owner/hapus/{id}', [OwnerKosController::class, 'hapus'])->name('owner.kos.hapus');
    });

    Route::get('/kamar/owner', [KamarOwnerController::class, 'index'])->name('owner.kamar');
    Route::get('/kamar/owner/create/{kos}', [KamarOwnerController::class, 'tambah'])->name('owner.kamar.tambah');
    Route::get('/kamar/owner/create/{kos}/detail', [KamarOwnerController::class, 'tambahKamar'])->name('owner.kamar.tambah.detail');
    Route::post('/kamar/owner/create/{kos}/detail/proses', [KamarOwnerController::class, 'tambahKamarProses'])->name('owner.kamar.tambah.detail.proses');
});

require __DIR__ . '/auth.php';
