<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('home', function () {
    return redirect('/dashboard');
});

// Route::get('{gggg}', function () {
//     return view('layouts.master');
// })->where('any', '.*');
// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
