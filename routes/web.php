<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MajestaController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GuestController;




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

Route::get('/guesttiperumah', [GuestController::class, 'guesttiperumah']);
Route::get('/guestsimulasikpr', [GuestController::class, 'guestsimulasikpr']);
Route::get('/guestgaleri', [GuestController::class, 'guestgaleri']);
Route::get('/guestcontent', [GuestController::class, 'guestcontent']);
Route::get('/guestcontent', [GuestController::class, 'showguestcontent']);
Route::get('/guestcontent/{id}', [GuestController::class, 'showcontent'])->name('guestcontent.show');

Route::middleware('auth', 'verified', 'checkrole:user')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    route::post('logout', LogoutController::class)->name('logout');
    Route::get('/tiperumah', [MajestaController::class, 'tiperumah']);
    Route::get('/galeri', [MajestaController::class, 'galeri']);
    Route::get('/booking', [MajestaController::class, 'booking']);
    Route::get('/simulasikpr', [MajestaController::class, 'simulasikpr']);
    Route::post('/booking', [MajestaController::class, 'storebooking']);
    Route::get('/content', [MajestaController::class, 'content']);
    Route::get('/content', [MajestaController::class, 'showContent']);
    Route::get('/content/{id}', [MajestaController::class, 'show'])->name('content.show');

});

Route::middleware('auth', 'verified', 'checkrole:admin')->group(function () {
    Route::get('/dashboardadmin', [AdminController::class, 'dashboardadmin']);
    Route::get('/dashboardadmin', [AdminController::class, 'viewbooking']);
    Route::post('/dashboardadmin/confirm', [AdminController::class, 'confirm'])->name('admin.booking.confirm');
    Route::get('/dashboardadmin/hapus/{id}', [AdminController::class, 'hapus_booking']);
    Route::get('/filter', [AdminController::class, 'filter']);
    Route::get('/tambahkonten', [AdminController::class, 'tambahkonten'])->name('tambahkonten');
    Route::post('/tambahkonten', [AdminController::class, 'store_content'])->name('store_content');
    Route::get('/editkonten', [AdminController::class, 'showcontent'])->name('contents.index');
    Route::delete('/editkonten/{id}', [AdminController::class, 'hapuskonten'])->name('contents.destroy');
    Route::get('/editkonten/{id}/edit', [AdminController::class, 'edit'])->name('contents.edit');
    Route::put('/editkonten/{id}', [AdminController::class, 'update'])->name('contents.update');
});

require __DIR__.'/auth.php';
