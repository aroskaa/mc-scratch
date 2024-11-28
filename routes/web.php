<?php

use App\Livewire\Faqs;
use App\Livewire\Login;
use App\Livewire\Profile;
use App\Livewire\ResetPassword;
use App\Livewire\ForgotPassword;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/faqs', Faqs::class)->name('faqs');

Route::get('/login', Login::class)->name('login');

Route::get('/forgot-password', ForgotPassword::class)->name('password.request');
Route::get('/reset-password/{token}', ResetPassword::class)->name('password.reset');

Route::post('/logout', function () {
    Auth::logout();
    return redirect()->route('login');
})->name('logout');


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard'); 
    })->name('dashboard');

    Route::get('/profile', Profile::class)->name('profile');
});

