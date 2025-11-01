<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Livewire\JdBuilder;

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/job-description', function () {
    return view('job-description');
});

Route::get('/create_jd', function () {
    return view('create_jd');
});

Route::middleware(['web'])->group(function () {
    Route::get('/jd/builder', JdBuilder::class)->name('jd.builder');
});
