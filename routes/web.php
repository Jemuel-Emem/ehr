<?php

use App\Http\Controllers\logout;
use App\Http\Middleware\admin;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

// Route::view('dashboard', 'dashboard')
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        if (Auth::user()->is_admin == 1) {
            return redirect()->route('Admindashboard');
        } else {
            return redirect()->route('user-dashboard');
        }
    })->name('dashboard');
});


Route::prefix('admin')->middleware(['auth', admin::class])->group(function () {
    Route::get('/Admindashboard', function () {
        return view('admin.index');
    })->name('Admindashboard');

    Route::get('/Add-patients', function () {
        return view('admin.add-patients');
    })->name('add-p');

    Route::get('/Patients-records', function () {
        return view('admin.patients-records');
    })->name('patients-rec');

    Route::get('/Search-patients', function () {
        return view('admin.search-patients');
    })->name('search-p');

});

Route::get('/logout', [logout::class, 'logout'])->name('logout');
Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
