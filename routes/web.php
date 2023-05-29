<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\aboutDocumentController;

//Auth::routes();

Route::get('/', function () {
    return view('home');
});

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('/documents', [AboutController::class, 'index']);
});

Route::get('/about_document/{id}', [aboutDocumentController::class, 'index']);

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes(['verify' => true]);
