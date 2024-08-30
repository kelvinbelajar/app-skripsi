<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventOrganizerController;
use App\Http\Controllers\AcaraController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\BookingTiketController;
use App\Http\Controllers\AcaraDetailController;
use App\Http\Controllers\KeuanganController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\PemasukanController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\CheckoutController;
use App\Models\BookingTiket;

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

#route landing page
Route::get('/', [LandingPageController::class, 'index']);
Route::post('/checkout', [LandingPageController::class, 'checkout'])->name('checkout');
Route::post('/booking/store', [LandingPageController::class, 'storeBooking'])->name('booking.store');
Route::post('/payment-callback', [LandingPageController::class, 'handlePaymentCallback'])->name('payment.callback');
Route::get('/test-booking', [LandingPageController::class, 'testBookingInsertion']);


Route::get('/dashboard', function () {
    return view('dashboard');
})
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::view('about', 'about')->name('about');

    Route::get('users', [UserController::class, 'index'])->name('users.index');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

##route for event organizer
Route::middleware(['auth', 'verified', 'role:admin|dinas'])->group(function () {
    Route::resource('event-organizers', EventOrganizerController::class);
    Route::get('printAllEventOrganizer', [ReportController::class, 'printAllEventOrganizer'])->name('printAllEventOrganizer');
    Route::get('printEventOrganizerbyID/{id}', [ReportController::class, 'printEventOrganizerbyID'])->name('printEventOrganizerbyID');
});

##route for acara
Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('acaras', AcaraController::class);
    Route::get('printAllAcara', [ReportController::class, 'printAllAcara'])->name('printAllAcara');
    Route::get('printAcarabyID/{id}', [ReportController::class, 'printAcarabyID'])->name('printAcarabyID');
});

#route for jadwal
Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('jadwals', JadwalController::class);
    Route::get('printAllJadwal', [ReportController::class, 'printAllJadwal'])->name('printAllJadwal');
    Route::get('printJadwalbyID/{id}', [ReportController::class, 'printJadwalbyID'])->name('printJadwalbyID');
});

#route for lokasi
Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('lokasis', LokasiController::class);
    Route::get('/lokasis/regency/{province_id}', [LokasiController::class, 'getRegency']);
    Route::get('/lokasis/districts/{regency_id}', [LokasiController::class, 'getDistricts']);
    Route::get('/lokasis/villages/{district_id}', [LokasiController::class, 'getVillages']);
    Route::get('printAllLokasi', [ReportController::class, 'printAllLokasi'])->name('printAllLokasi');
    Route::get('printLokasibyID/{id}', [ReportController::class, 'printLokasibyID'])->name('printLokasibyID');
});

#route for acara detail
Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('acara_details', AcaraDetailController::class);
    Route::get('printAllAcaraDetail', [ReportController::class, 'printAllAcaraDetail'])->name('printAllAcaraDetail');
    Route::get('printAcaraDetailbyID/{id}', [ReportController::class, 'printAcaraDetailbyID'])->name('printAcaraDetailbyID');
});

##route for booking tiket
Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('booking_tikets', BookingTiketController::class); 
    Route::get('printAllBookingTiket', [ReportController::class, 'printAllBookingTiket'])->name('printAllBookingTiket');
    Route::get('printBookingTiketbyID/{id}', [ReportController::class, 'printBookingTiketbyID'])->name('printBookingTiketbyID');
});



#Route for keuangan
Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('keuangans', KeuanganController::class); 

});



##Route for pemasukan
Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('pemasukans', PemasukanController::class);
    Route::get('printAllPemasukan', [ReportController::class, 'printAllPemasukan'])->name('printAllPemasukan');
    Route::get('printPemasukanbyID/{id}', [ReportController::class, 'printPemasukanbyID'])->name('printPemasukanbyID');
});

##Route for pengeluaran
Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('pengeluarans', PengeluaranController::class);
    Route::get('printAllPengeluaran', [ReportController::class, 'printAllPengeluaran'])->name('printAllPengeluaran');
    Route::get('printPengeluaranbyID/{id}', [ReportController::class, 'printPengeluaranbyID'])->name('printPengeluaranbyID');
});

##route for checkout

require __DIR__ . '/auth.php';
