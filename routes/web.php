<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\UserController;
use \App\Http\Controllers\DashboardController;
use \App\Http\Controllers\PostJobController;
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

Route::get('/email/verify/{id}/{hash}', function (\Illuminate\Foundation\Auth\EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/login');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::get('/users', [UserController::class,'index']);
Route::get('/register/seeker', [UserController::class, 'createSeeker'])->name('create.seeker');
Route::post('/register/seeker', [UserController::class, 'storeSeeker'])->name('store.seeker');

Route::get('/register/employer', [UserController::class, 'createEmployer'])->name('create.employer');
Route::post('/register/employer', [UserController::class, 'storeEmployer'])->name('store.employer');

Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'postLogin'])->name('store.login');

Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::controller(DashboardController::class)->middleware(['auth','verified'])->group(function () {
    Route::get('/dashboard', 'index')->name('dashboard');
    Route::get('/dashboard/verify','verify')->name('verification.notice');
    Route::get('/resend/verify/email', 'resend')->name('resend.verify');

});

Route::controller(PostJobController::class)->middleware(['auth','verified'])->group(function () {
    Route::get('/dashboard/create','create')->name('post.job');
    Route::post('/dashboard/store','store')->name('store.post.job');
    Route::get('/dashboard/{id}/edit','edit')->name('edit.post.job');
    Route::put('/dashboard/update/{id}','update')->name('update.post.job');
    Route::get('/dashboard/index','index')->name('index.job');
    Route::post('/dashboard/delete/{id}', 'destroy')->name('destroy.job');
});

Route::get('data-tables-data', [\App\Http\Controllers\DataTablesController::class ,'data'])->name('data.tables.data');
