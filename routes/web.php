<?php

use Illuminate\Support\Facades\Route;

Route::get('/framework', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/', function () {
    return view('home');
});
