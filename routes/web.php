<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\aboutDocumentController;

Route::get('/', function () {
    return view('home');
});

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::post('client', [ClientController::class, 'update']);
    Route::get('client/edit', [ClientController::class, 'edit'])->name('client.edit');
    Route::apiResource('orders', ApplicationController::class);
});

Route::get('/documents', [AboutController::class, 'index']);

Route::get('/about_document/{id}', [aboutDocumentController::class, 'index']);

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/test', function () {
    return view('auth.passwords.success', ['text' => 'Ваша учетная запись подтверждена!']);
});

Auth::routes(['verify' => true]);
