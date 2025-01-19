<?php

use App\Livewire\Auth\ForgotPassword;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Auth\ResetPassword;
use App\Livewire\Feature\User\Dashboard;
use App\Livewire\Feature\User\Profile;
use App\Livewire\Index;
use App\Livewire\Pages\About;
use App\Livewire\Pages\Contact;
use App\Livewire\Pages\OurTeam;
use App\Livewire\Pages\Program;
use App\Livewire\Pages\ProgramDetail;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'guest'], function () {
    Route::get('/', Index::class)->name('landing');
    Route::get('/about', About::class)->name('about');
    Route::get('/our-program', Program::class)->name('our-program');
    Route::get('/our-teams', OurTeam::class)->name('our-team');
    Route::get('/contact', Contact::class)->name('contact');
    Route::get('/login', Login::class)->name('login');
    Route::get('/register', Register::class)->name('register');
    Route::get('/forgot-password', ForgotPassword::class)->name('forgot.password');
    Route::get('/reset-password/{token}', ResetPassword::class)->name('password.reset');
    Route::get('/our-program/{slug}', ProgramDetail::class)->name('program.detail');
    Route::get('oauth/google', [\App\Http\Controllers\OauthController::class, 'redirectToProvider'])->name('oauth.google');
    Route::get('oauth/google/callback', [\App\Http\Controllers\OauthController::class, 'handleProviderCallback'])->name('oauth.google.callback');

});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/profile', Profile::class)->name('profile');
});
