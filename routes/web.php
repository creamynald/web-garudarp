<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\FiveM\PlayerTracker;

Route::get('/', function () {
    return view('frontend.app');
});

Route::get('/players', PlayerTracker::class);