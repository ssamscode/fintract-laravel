<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\HelpController;
use App\Http\Controllers\ReportController;

/*
|--------------------------------------------------------------------------
| Landing Page
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('landing.index');
})->name('home');

/*
|--------------------------------------------------------------------------
| Protected Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Dashboard
    |--------------------------------------------------------------------------
    */

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    /*
    |--------------------------------------------------------------------------
    | Profile (Laravel Breeze)
    |--------------------------------------------------------------------------
    */

    /*
|--------------------------------------------------------------------------
| Profile (Laravel Breeze)
|--------------------------------------------------------------------------
*/

Route::get('/profile', [ProfileController::class, 'edit'])
    ->name('profile.edit');

Route::patch('/profile', [ProfileController::class, 'update'])
    ->name('profile.update');

// Upload / Ganti Foto Profil
Route::patch('/profile/photo', [ProfileController::class, 'updatePhoto'])
    ->name('profile.photo.update');

// Hapus Foto Profil
Route::delete('/profile/photo', [ProfileController::class, 'deletePhoto'])
    ->name('profile.photo.delete');

// Hapus Akun
Route::delete('/profile', [ProfileController::class, 'destroy'])
    ->name('profile.destroy');

    /*
    |--------------------------------------------------------------------------
    | User Profile
    |--------------------------------------------------------------------------
    */

    Route::get('/profil', [UserProfileController::class, 'index'])
        ->name('profile.index');

    /*
    |--------------------------------------------------------------------------
    | Transactions
    |--------------------------------------------------------------------------
    */

    Route::resource('transactions', TransactionController::class);

    /*
    |--------------------------------------------------------------------------
    | Reports
    |--------------------------------------------------------------------------
    */

    Route::get('/laporan', [ReportController::class, 'index'])
        ->name('laporan.index');

    Route::get('/laporan/pdf', [ReportController::class, 'exportPdf'])
        ->name('laporan.pdf');

    /*
    |--------------------------------------------------------------------------
    | Help
    |--------------------------------------------------------------------------
    */

    Route::get('/help', [HelpController::class, 'index'])
        ->name('help.index');
});

/*
|--------------------------------------------------------------------------
| Testing
|--------------------------------------------------------------------------
*/

Route::view('/test', 'test');

Route::view('/auth-test', 'auth.test-layout');

/*
|--------------------------------------------------------------------------
| Authentication
|--------------------------------------------------------------------------
*/

require __DIR__ . '/auth.php';