<?php

use App\Livewire\Index;
use App\Livewire\Pages\About;
use App\Livewire\Pages\Program;
use Illuminate\Support\Facades\Route;

Route::get('/', Index::class)->name('landing');
Route::get('/about', About::class)->name('about');
Route::get('/our-program', Program::class)->name('our-program');
