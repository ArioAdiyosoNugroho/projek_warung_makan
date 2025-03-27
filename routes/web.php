<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\InformasiWarungController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
// ===========================halaman home page========================
// Route::get('/home', function () {
//     return view('Home.index');
// })->name('halhome');

Route::get('/home', [HomeController::class, 'index'])->name('halhome');


// ============================== end home page =======================//


// =================================halaman admin========================
Route::get('/user', function () {
    return view('admin.index');
})->name('haladmin');

// ````````````settings`````````````````
Route::get('/setting-info', [InformasiWarungController::class, 'showEdit'])->name('setinfo');
Route::post('/setting-info', [InformasiWarungController::class, 'update']);
route::get('/setting-about', function () {
    return view('setting.setabout');
})->name('setabout');


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