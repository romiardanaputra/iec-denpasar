<?php

use App\Livewire\Index;
use Illuminate\Support\Facades\Route;

Route::get('/', Index::class)->name('landing');
