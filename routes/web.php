<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MajestaController;
use App\Http\Controllers\LogoutController;



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

});

Route::middleware('auth', 'verified', 'checkrole:admin')->group(function () {
    Route::get('/dashboardadmin', [MajestaController::class, 'dashboardadmin']);
    Route::get('/dashboardadmin', [MajestaController::class, 'viewbooking']);
    Route::get('/dashboardadmin/hapus/{id}', [MajestaController::class, 'hapus_booking']);
    Route::get('/filter', [MajestaController::class, 'filter']);

});

require __DIR__.'/auth.php';
