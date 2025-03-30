<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InformasiWarungController;
use App\Http\Controllers\SetAboutController;
use Illuminate\Support\Facades\Route;



Route::fallback(function () {
    return response()->view('errors.notfound', [], 404);
});



// ===========================halaman home page========================
Route::get('/', [HomeController::class, 'index'])->name('halhome');
// ============================== end home page =======================//


// =================================halaman admin========================
Route::get('/user', function () {
    return view('admin.index');
})->name('haladmin');

// ````````````settings`````````````````
//informasi
Route::get('/setting-info', [InformasiWarungController::class, 'showEdit'])->name('setinfo');
Route::post('/setting-info', [InformasiWarungController::class, 'update']);

//about
Route::get('setting-about', [AboutController::class, 'index'])->name('setabout'); // Menampilkan form
Route::post('setting-about', [AboutController::class, 'store'])->name('setabout.store'); // Menyimpan data baru
Route::put('setting-about/{id}', [AboutController::class, 'update'])->name('setabout.update'); // Update data
// Route::delete('setting-about/{id}', [AboutController::class, 'destroy'])->name('setabout.destroy'); // Hapus data



// ==================================end halaman admin=================//




// ========================jetstream=========================
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
// =========================================================