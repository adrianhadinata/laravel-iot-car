<?php

use Illuminate\Support\Facades\Route;

Route::get('/framework', function () {
    return view('welcome', ['title' => 'Tech Used']);
});

Route::get('/about', function () {
    return view('about', ['title' => 'About']);
});

Route::get('/', function () {
    return view('home', ['title' => 'Home']);
});

Route::get('/client', function () {
    return view('client', ['title' => 'MQTT Client']);
});
