<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DataPaketController;
use App\Http\Controllers\Admin\DataPelangganController;
use App\Http\Controllers\Admin\DataPesananController;
use App\Http\Controllers\Admin\JenisSepatuController;
use App\Http\Controllers\Admin\MetodePembayaranController;
use App\Http\Controllers\Admin\ProfiladminController;
use App\Http\Controllers\Admin\TransaksiController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\Deskripsilayanan\DeepcleaningController;
use App\Http\Controllers\User\Deskripsilayanan\FastcleaningController;
use App\Http\Controllers\User\Deskripsilayanan\ReglueController;
use App\Http\Controllers\User\Deskripsilayanan\RepaintbiasaController;
use App\Http\Controllers\User\Deskripsilayanan\RepaintkhususController;
use App\Http\Controllers\User\Deskripsilayanan\UnyellowingController;
use App\Http\Controllers\User\Deskripsilayanan\WhiteningController;
use App\Http\Controllers\User\Deskripsilayanan\PickupServicesController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\LayananController;
use App\Http\Controllers\User\OrderController;
use App\Http\Controllers\User\OrderPickupController;
use App\Http\Controllers\User\PesananController;
use App\Http\Controllers\User\ReviewController;
use App\Http\Controllers\User\RiwayatController;
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

// KHUSUS USER ATAU CUSTOMER
Route::get('/', [HomeController::class, 'index'])->name('welcome');

Route::get('/layanan', [LayananController::class, 'index'])->name('user.layanan');
Route::get('/order', [OrderController::class, 'index'])->name('user.order');
Route::post('/order/store', [OrderController::class, 'store'])->name('user.order.store');

Route::get('/pesanan', [PesananController::class, 'index'])->name('user.pesanan');
Route::get('/riwayat', [RiwayatController::class, 'index'])->name('user.riwayat');
Route::get('/review', [ReviewController::class, 'index'])->name('user.review');
Route::get('/orderpickup', [OrderPickupController::class, 'index'])->name('user.orderpickup');

// DESKRIPSI LAYANAN (user)
Route::get('/fastcleaning', [FastcleaningController::class, 'index'])->name('user.fastcleaning');
Route::get('/deepcleaning', [DeepcleaningController::class, 'index'])->name('user.deepcleaning');
Route::get('/unyellowing', [UnyellowingController::class, 'index'])->name('user.unyellowing');
Route::get('/whitening', [WhiteningController::class, 'index'])->name('user.whitening');
Route::get('/reglue', [ReglueController::class, 'index'])->name('user.reglue');
Route::get('/repaintbiasa', [RepaintbiasaController::class, 'index'])->name('user.repaintbiasa');
Route::get('/repaintkhusus', [RepaintkhususController::class, 'index'])->name('user.repaintkhusus');
Route::get('/pickupservices', [PickupServicesController::class, 'index'])->name('user.pickupservices');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// KHUSUS ADMIN
Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
Route::get('/admin/transaksi', [TransaksiController::class, 'index'])->name('admin.transaksi');
Route::get('/admin/datapelanggan', [DataPelangganController::class, 'index'])->name('admin.datapelanggan');

// Layanan
Route::get('/admin/datapaket', [DataPaketController::class, 'index'])->name('admin.datapaket');
Route::post('/admin/datapaket', [DataPaketController::class, 'store'])->name('admin.datapaket.store');
Route::post('/admin/datapaket/update/{id}', [DataPaketController::class, 'update'])->name('admin.datapaket.update');
Route::delete('admin/datapaket/{id}', [DataPaketController::class, 'destroy'])->name('admin.datapaket.destroy');

Route::get('/admin/jenissepatu', [JenisSepatuController::class, 'index'])->name('admin.jenissepatu');
Route::get('/admin/metodepembayaran', [MetodePembayaranController::class, 'index'])->name('admin.metodepembayaran');
Route::get('/admin/datapesanan', [DataPesananController::class, 'index'])->name('admin.datapesanan');
Route::get('/admin/profiladmin', [ProfiladminController::class, 'index'])->name('admin.profiladmin');

require __DIR__.'/auth.php';
