<?php

use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Feature\User\Dashboard;
use App\Livewire\Index;
use App\Livewire\Pages\About;
use App\Livewire\Pages\Contact;
use App\Livewire\Pages\OurTeam;
use App\Livewire\Pages\Program;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'guest'], function () {
    Route::get('/', Index::class)->name('landing');
    Route::get('/about', About::class)->name('about');
    Route::get('/our-program', Program::class)->name('our-program');
    Route::get('/our-teams', OurTeam::class)->name('our-team');
    Route::get('/contact', Contact::class)->name('contact');
    Route::get('/login', Login::class)->name('login');
    Route::get('/register', Register::class)->name('register');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
});
