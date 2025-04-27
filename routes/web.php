<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InformasiWarungController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\SetAboutController;
use App\Http\Controllers\SpecialController;
use App\Http\Controllers\WhyUsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WhyUsPageController;




Route::fallback(function () {
    return response()->view('errors.notfound', [], 404);
});



// ===========================halaman home page========================
Route::get('/', [HomeController::class, 'index'])->name('halhome');
Route::get('Read-WhyUs/', [WhyUsPageController::class, 'index'])->name('readWhyUs'); // Menampilkan data

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
Route::get('setting-about', [AboutController::class, 'index'])->name('setabout'); 
Route::post('setting-about', [AboutController::class, 'store'])->name('setabout.store'); 
Route::put('setting-about/{id}', [AboutController::class, 'update'])->name('setabout.update'); 

//whyus
Route::get('setting-WhyUs', [WhyUsController::class, 'index'])->name('setWhyUs'); 
Route::post('setting-WhyUs', [WhyUsController::class, 'store'])->name('setWhyUs.store'); 
Route::get('setting-WhyUs/{id}/edit', [WhyUsController::class, 'edit'])->name('setWhyUs.edit'); 
Route::put('setting-WhyUs/{id}', [WhyUsController::class, 'update'])->name('setWhyUs.update'); 
Route::delete('setting-WhyUs/{id}', [WhyUsController::class, 'destroy'])->name('setWhyUs.destroy'); 
// --read
Route::get('setting-WhyUs/{id}', [WhyUsController::class, 'show'])->name('setWhyUs.show');

//Menu
Route::resource('menus', MenuController::class);

//category
Route::resource('categories', CategoryController::class);

//special
Route::resource('specials', SpecialController::class);

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