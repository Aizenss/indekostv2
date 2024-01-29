<?php

use App\Models\Kamarkami;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\UlasanController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\ListKosController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\TerminateCsrfToken;
use App\Http\Controllers\OwnerKosController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\DetailKostController;
use App\Http\Controllers\KamarOwnerController;
use App\Http\Controllers\KelolaAdminController;
use App\Http\Controllers\KelolaOwnerController;
use App\Http\Controllers\SemuaRatingControoller;
use App\Http\Controllers\ApprovalAdminController;
use App\Http\Controllers\ApprovalOwnerController;
use App\Http\Controllers\NotifController;
use App\Http\Controllers\FooterController;
use App\Http\Controllers\PenarikanController;
use App\Http\Controllers\TransaksiAdminController;

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

Route::get('/', [ListKosController::class, 'landing'])->name('landing');

Route::get('/gaga', function () {
    return view('titip');
});



Route::middleware('auth', 'verified')->group(function () {
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/upload', [ProfileController::class, 'uploadfoto'])->name('profile.foto.upload');
    Route::patch('/profile/password/update', [ProfileController::class, 'passwordupdate'])->name('profile.password.update');
    route::post('/notif', [NotifController::class, 'update'])->name('notif');

});

Route::middleware(['auth', 'role:admin', 'verified'])->group(function () {
    Route::get('/approvaladmin', [ApprovalAdminController::class, 'index'])->name('admin.approvaladmin');
    Route::patch('/approvaladmin/setuju/{kos}', [ApprovalAdminController::class, 'setuju'])->name('admin.approvaladmin.setuju');
    Route::patch('/approvaladmin/tolak/{kos}', [ApprovalAdminController::class, 'tolak'])->name('admin.approvaladmin.tolak');
    Route::get('/transaksiowner', [TransaksiAdminController::class, 'index'])->name('admin.transaksiowner');
    Route::get('/kelolaowner', [KelolaAdminController::class, 'index'])->name('admin.kelolaowner');
    Route::get('/admin-kelolaowner', [KelolaOwnerController::class, 'index'])->name('kelola-admin');
    Route::get('/admin-kelolaowner/{owner}', [KelolaOwnerController::class, 'show'])->name('kelolaowner.show');
    Route::get('/admin-kelolaowner/{owner}/delete', [KelolaOwnerController::class, 'delete'])->name('kelolaowner.delete');
    Route::get('/dashboard/admin', [DashboardController::class, 'dashboard'])->name('admin.dashboard');
});

Route::middleware(['auth', 'role:user', 'verified'])->group(function () {
    Route::get('/list-kos', [ListKosController::class, 'index'])->name('user.kamarkami');
    Route::get('/detail-kost/{kos}', [DetailKostController::class, 'index'])->name('user.detailkost');
    Route::post('/detail-kost/{kos}/payment{kamar}', [PaymentController::class, 'pay'])->name('user.detailkost.payment');
    Route::post('/buat/ulasan', [UlasanController::class, 'buat'])->name('ratting.buat');
    Route::get('/payment', [PaymentController::class, 'index'])->name('payment');
    Route::post('/payment/proses-data/{kamar}', [PaymentController::class, 'proses'])->name('payment.proses');
    Route::put('/payment/batalkan/{kamar}', [PaymentController::class, 'batal'])->name('payment.batal');
    Route::get('/semuarating{kos}',[SemuaRatingControoller::class, 'index'])->name('semuarating');
    route::get('/history', [HistoryController::class, 'index'])->name('history');
    route::get('/history/{kamar}', [HistoryController::class, 'show'])->name('history.detail');
    route::post('/history/{kamar}/ajukanLagi', [PaymentController::class, 'payAgain'])->name('history.detail.pay');
    route::post('/history/{kamar}/proses', [PaymentController::class, 'prosesLagi'])->name('history.detail.proses');
});

Route::middleware(['auth', 'role:owner', 'verified'])->group(function () {
    Route::get('/dashboard/owner', [OwnerController::class, 'index'])->name('owner.dashboard');
    Route::get('/approval/owner', [ApprovalOwnerController::class, 'index'])->name('owner.approval');
    Route::patch('/approval/owner/terima/{kamar}', [ApprovalOwnerController::class, 'terima'])->name('owner.approval.terima');
    Route::patch('/approval/owner/tolak/{kamar}', [ApprovalOwnerController::class, 'tolak'])->name('owner.approval.tolak');

    Route::patch('/approval/owner/terima/lagi/{kamar}', [ApprovalOwnerController::class, 'terimaLagi'])->name('owner.approval.terimaLagi');
    Route::patch('/approval/owner/tolak/{kamar}', [ApprovalOwnerController::class, 'tolak'])->name('owner.approval.tolak');

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
    Route::patch('/kamar/owner/status/update{kamar}', [KamarOwnerController::class, 'status'])->name('owner.kamar.rubah.status');
    Route::get('/kamar/owner/create/{kos}/detail', [KamarOwnerController::class, 'tambahKamar'])->name('owner.kamar.tambah.detail');
    Route::delete('/kamar/owner/hapus{kamar}', [KamarOwnerController::class, 'hapus'])->name('owner.kamar.hapus');
    Route::get('/kamar/owner/create/{kos}/ubah/{kamar}', [KamarOwnerController::class, 'ubah'])->name('owner.kamar.edit');
    Route::put('/kamar/owner/create/{kos}/ubahproses/{kamar}', [KamarOwnerController::class, 'ubahproses'])->name('owner.kamar.update');
    Route::post('/kamar/owner/create/{kos}/detail/proses', [KamarOwnerController::class, 'tambahKamarProses'])->name('owner.kamar.tambah.detail.proses');

    Route::get('/tracking/owner', [HistoryController::class, 'owner'])->name('owner.history');
    Route::get('/tracking/owner/show/{tracking}', [HistoryController::class, 'showTracking'])->name('owner.history.show');
    Route::put('/tracking/owner/edit/{tracking}/update', [HistoryController::class, 'editTracking'])->name('owner.history.edit');

    Route::get('/penarikan', [PenarikanController::class, 'index'])->name('owner.penarikan');
});



require __DIR__ . '/auth.php';
