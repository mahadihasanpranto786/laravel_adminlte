<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\CommonController;

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


Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/check_email_address', [CommonController::class, 'checkEmailAddress'])->name('check_email_address');
Route::get('/check_phone_number', [CommonController::class, 'checkPhoneNumber'])->name('check_phone_number');
Route::post('/ck_image_upload', [CommonController::class, 'ckImageUpload'])->name('ck_image_upload');
//custom Profile
Route::get('/edit_profile', [CommonController::class, 'editProfile'])->name('edit_profile');

require __DIR__ . '/auth.php';
