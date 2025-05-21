<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DataPaketController;
use App\Http\Controllers\Admin\DataPelangganController;
use App\Http\Controllers\Admin\DataPesananController;
use App\Http\Controllers\Admin\JenisSepatuController;
use App\Http\Controllers\Admin\LaporanPenjualanController;
use App\Http\Controllers\Admin\LoginAdminController;
use App\Http\Controllers\Admin\MetodePembayaranController;
use App\Http\Controllers\Admin\ProfiladminController;
use App\Http\Controllers\Admin\ReviewPelangganController;
use App\Http\Controllers\Admin\TransaksiController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\Deskripsilayanan\DeepcleaningController;
use App\Http\Controllers\User\Deskripsilayanan\FastcleaningController;
use App\Http\Controllers\User\Deskripsilayanan\ReglueController;
use App\Http\Controllers\User\Deskripsilayanan\RepaintbiasaController;
use App\Http\Controllers\User\Deskripsilayanan\RepaintkhususController;
use App\Http\Controllers\User\Deskripsilayanan\UnyellowingController;
use App\Http\Controllers\User\Deskripsilayanan\WhiteningController;
use App\Http\Controllers\User\Deskripsilayanan\PickupServicesController;
use App\Http\Controllers\User\EditprofilController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\LayananController;
use App\Http\Controllers\User\MidtransController;
use App\Http\Controllers\User\OrderController;
use App\Http\Controllers\User\OrderPickupController;
use App\Http\Controllers\User\PesananController;
use App\Http\Controllers\User\ReviewController;
use App\Http\Controllers\User\RiwayatController;
use App\Http\Controllers\User\VerifikasiEmailController;
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
Route::get('/profil', [EditprofilController::class, 'index'])->name('user.editprofil');
Route::put('/profile/update', [EditprofilController::class, 'update'])->name('profile.user.update');

// User login
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);

// Verifikasi email
Route::get('/verify-email', [VerifikasiEmailController::class, 'showVerifyPage'])->name('verify.email.page');
Route::get('/verify-email/submit', [VerifikasiEmailController::class, 'verify'])->name('verify.email.submit');

// Route untuk logout
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

// User Register
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register.user');
Route::post('/register', [RegisteredUserController::class, 'register'])->name('register.submit');

Route::get('/layanan', [LayananController::class, 'index'])->name('user.layanan');

Route::get('/order', [OrderController::class, 'create'])->name('user.order');
Route::post('/order', [OrderController::class, 'store'])->name('user.order.store');
Route::post('/order/{id}/bayar', [OrderController::class, 'updatePaymentStatus'])->name('order.bayar');

Route::get('/pesanan', [PesananController::class, 'index'])->name('user.pesanan');
Route::get('/pesanan/get-metode', [PesananController::class, 'getMetodeByType']);
Route::post('/pembayaran/{id}', [PesananController::class, 'bayar'])->name('bayar.pesanan');

Route::get('/riwayat', [RiwayatController::class, 'index'])->name('user.riwayat');

// ORDER PICKUP SERVICES
Route::get('/orderpickup', [OrderPickupController::class, 'index'])->name('user.orderpickup');
Route::post('/orderpickup', [OrderPickupController::class, 'store'])->name('orderpickup.store');

Route::get('/review', [ReviewController::class, 'index'])->name('user.review');
Route::post('/review', [ReviewController::class, 'store'])->name('user.kirimreview');

// DESKRIPSI LAYANAN (user)
Route::get('/fastcleaning', [FastcleaningController::class, 'index'])->name('user.fastcleaning');
Route::get('/deepcleaning', [DeepcleaningController::class, 'index'])->name('user.deepcleaning');
Route::get('/unyellowing', [UnyellowingController::class, 'index'])->name('user.unyellowing');
Route::get('/whitening', [WhiteningController::class, 'index'])->name('user.whitening');
Route::get('/reglue', [ReglueController::class, 'index'])->name('user.reglue');
Route::get('/repaintbiasa', [RepaintbiasaController::class, 'index'])->name('user.repaintbiasa');
Route::get('/repaintkhusus', [RepaintkhususController::class, 'index'])->name('user.repaintkhusus');
Route::get('/pickupservices', [PickupServicesController::class, 'index'])->name('user.pickupservices');

// LOGIN ADMIN
Route::get('/admin/login', [LoginAdminController::class, 'index'])->name('admin.login');
Route::post('/admin/login', [LoginAdminController::class, 'login'])->name('login.admin');
Route::post('/admin/logout', [LoginAdminController::class, 'logout'])->name('admin.logout');

// KHUSUS ADMIN
Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

Route::get('/admin/transaksi', [TransaksiController::class, 'index'])->name('admin.transaksi');
Route::post('/admintransaksi/{id}/approve', [TransaksiController::class, 'approve'])->name('transaksi.approve');
Route::post('/admin/transaksi/{id}/delete', [TransaksiController::class, 'delete'])->name('transaksi.delete');

Route::get('/admin/datapelanggan', [DataPelangganController::class, 'index'])->name('admin.datapelanggan');
Route::get('/admin/review', [ReviewPelangganController::class, 'index'])->name('admin.review');
Route::put('/admin/profile/update', [ProfiladminController::class, 'updateProfile'])->name('profile.admin.update');

Route::get('/admin/laporanpenjualan', [LaporanPenjualanController::class, 'index'])->name('admin.laporanpenjualan');
Route::get('/admin/laporan-penjualan/pdf', [LaporanPenjualanController::class, 'cetakPDF'])->name('laporan.penjualan.pdf');

// Layanan
Route::get('/admin/datapaket', [DataPaketController::class, 'index'])->name('admin.datapaket');
Route::post('/admin/datapaket/tambah', [DataPaketController::class, 'tambah'])->name('datapaket.tambah');
Route::put('/admin/datapaket/update/{id}', [DataPaketController::class, 'update'])->name('datapaket.update');
Route::delete('admin/datapaket/{id}', [DataPaketController::class, 'destroy'])->name('datapaket.destroy');

// Jenis Sepatu
Route::get('/admin/jenissepatu', [JenisSepatuController::class, 'index'])->name('admin.jenissepatu');
Route::post('/admin/jenissepatu/tambah', [JenisSepatuController::class, 'tambah'])->name('jenissepatu.tambah');
Route::put('/admin/jenissepatu/update/{id}', [JenisSepatuController::class, 'update'])->name('jenissepatu.update');
Route::delete('admin/jenissepatu/{id}', [JenisSepatuController::class, 'destroy'])->name('jenissepatu.destroy');

// Metode Pembayaran
Route::get('/admin/metodepembayaran', [MetodePembayaranController::class, 'index'])->name('admin.metodepembayaran');
Route::post('/admin/metodepembayaran/tambah', [MetodePembayaranController::class, 'tambah'])->name('metodepembayaran.tambah');
Route::put('/admin/metodepembayaran/update/{id}', [MetodePembayaranController::class, 'update'])->name('metodepembayaran.update');
Route::delete('/admin/metodepembayaran/{id}', [MetodePembayaranController::class, 'destroy'])->name('metodepembayaran.destroy');

Route::get('/admin/datapesanan', [DataPesananController::class, 'index'])->name('admin.datapesanan');
Route::post('/admin/datapesanan/update-status/{id}', [DataPesananController::class, 'updateStatus'])->name('orders.updateStatus');
Route::delete('/admin/datapesanan/delete/{id}', [DataPesananController::class, 'delete'])->name('orders.delete');

Route::get('/admin/profiladmin', [ProfiladminController::class, 'index'])->name('admin.profiladmin');

// Midtrans
Route::post('/midtrans/callback', [MidtransController::class, 'handleCallback']);

require __DIR__ . '/auth.php';
