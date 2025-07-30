<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', [UserController::class, 'index'])->name('users.index');

Route::get('/about', [UserController::class, 'about'])->name('users.about');


// Route::get('/donasi', function () {
//     return view('pages.donasi');
// });

Route::get('/donasi', [UserController::class, 'donasi'])->name('user.donasi-view');

Route::post('/creat-donasi', [UserController::class, 'creat_donasi'])->name('user.donasi');


Route::get('/program', [UserController::class, 'program'])->name('user.program');




Route::get('/berita', [UserController::class, 'berita'])->name('user.berita');

Route::get('/galery', [UserController::class, 'galery'])->name('galery');

Route::post('/updatestatus/{id}', [UserController::class, 'updateStatus'])->name('update-status');

Route::get('/kontak', function () {
    return view('pages.contact');
});