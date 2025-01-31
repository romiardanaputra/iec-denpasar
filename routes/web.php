<?php

use App\Http\Controllers\OauthController;
use App\Http\Middleware\HasRoleAdminMiddleware;
use App\Livewire\Auth\EmailVerificationPrompt;
use App\Livewire\Auth\ForgotPassword;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Auth\ResetPassword;
use App\Livewire\Auth\VerifyEmail;
use App\Livewire\Feature\Payment\Invoice;
use App\Livewire\Feature\User\Bill;
use App\Livewire\Feature\User\ClassInfo;
use App\Livewire\Feature\User\Dashboard;
use App\Livewire\Feature\User\ExamGrade;
use App\Livewire\Feature\User\Profile;
use App\Livewire\Feature\User\Schedule;
use App\Livewire\Index;
use App\Livewire\Pages\About;
use App\Livewire\Pages\Contact;
use App\Livewire\Pages\OurTeam;
use App\Livewire\Pages\Program;
use App\Livewire\Pages\ProgramDetail;
use Illuminate\Support\Facades\Route;
use Spatie\Sitemap\SitemapGenerator;

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
    Route::get('oauth/google', [OauthController::class, 'redirectToProvider'])->name('oauth.google');
    Route::get('oauth/google/callback', [OauthController::class, 'handleProviderCallback'])->name('oauth.google.callback');
    Route::get('/sitemap', function () {
        $path = public_path('sitemap.xml');

        SitemapGenerator::create(config('app.url'))
            ->writeToFile($path);

        return response()->json(['message' => 'Sitemap created successfully!', 'path' => $path]);
    });
});

Route::group(['middleware' => 'auth'], function (): void {
    Route::get('verify-email', EmailVerificationPrompt::class)
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmail::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    // Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
    //   ->middleware('throttle:6,1')
    //   ->name('verification.send');
});

Route::group(['middleware' => ['auth', 'verified', HasRoleAdminMiddleware::class]], function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/profile', Profile::class)->name('profile');
    Route::get('/schedule', Schedule::class)->name('schedule');
    Route::get('/exam-grade', ExamGrade::class)->name('exam-grade');
    Route::get('/class-info', ClassInfo::class)->name('class-info');
    Route::get('/bill', Bill::class)->name('bill');
    Route::get('/invoice', Invoice::class)->name('invoice');
});
