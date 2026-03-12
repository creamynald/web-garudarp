<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\FiveM\PlayerTracker;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/players', PlayerTracker::class);