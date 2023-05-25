<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\aboutDocumentController;


Route::get('/', function () {
    return view('home');
});

Route::get('/documents', [AboutController::class, 'index']);

Route::get('/about_document/{id}', [aboutDocumentController::class, 'index']);

Route::get('/contact', function () {
    return view('contact');
});
