<?php

use App\Http\Controllers\OauthController;
use App\Http\Controllers\PaymentController;
use App\Http\Middleware\HasRoleUserMiddleware;
use App\Livewire\Auth\EmailVerificationPrompt;
use App\Livewire\Auth\ForgotPassword;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Auth\ResetPassword;
use App\Livewire\Auth\VerifyEmail;
use App\Livewire\Feature\Payment\Invoice;
use App\Livewire\Feature\User\Bill;
use App\Livewire\Feature\User\Dashboard;
use App\Livewire\Feature\User\ExamGrade;
use App\Livewire\Feature\User\Profile;
use App\Livewire\Index;
use App\Livewire\Pages\About;
use App\Livewire\Pages\Blog;
use App\Livewire\Pages\BlogDetail;
use App\Livewire\Pages\Contact;
use App\Livewire\Pages\OurTeam;
use App\Livewire\Pages\Program;
use App\Livewire\Pages\ProgramDetail;
use App\Livewire\Partials\Transaction\FailedPayment;
use App\Livewire\Partials\Transaction\PaymentSuccess;
use App\Livewire\Partials\Transaction\PendingPayment;
use Illuminate\Support\Facades\Route;
use Spatie\Sitemap\SitemapGenerator;

// Route::get('/sitemap', function () {
//     $path = public_path('sitemap.xml');
//     SitemapGenerator::create(config('app.url'))
//         ->writeToFile($path);

//     return response()->json(['message' => 'Sitemap created successfully!', 'path' => $path]);
// });

Route::group(['middleware' => 'web'], function () {
    Route::get('/', Index::class)->name('landing');
    Route::get('/about', About::class)->name('about');
    Route::get('/our-program', Program::class)->name('our-program');
    Route::get('/our-teams', OurTeam::class)->name('our-team');
    Route::get('/contact', Contact::class)->name('contact');
    Route::get('/our-program/{slug}', ProgramDetail::class)->name('program.detail');
    Route::get('/blog', Blog::class)->name('blog');
    Route::get('/blog/{slug}', BlogDetail::class)->name('blog.detail');
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', Login::class)->name('login');
    Route::get('/register', Register::class)->name('register');
    Route::get('/forgot-password', ForgotPassword::class)->name('forgot.password');
    Route::get('/reset-password/{token}', ResetPassword::class)->name('password.reset');
    Route::get('/oauth/google', [OauthController::class, 'redirectToProvider'])->name('oauth.google');
    Route::get('/oauth/google/callback', [OauthController::class, 'handleProviderCallback'])->name('oauth.google.callback');
});

Route::group(['middleware' => 'auth'], function (): void {
    Route::get('verify-email', EmailVerificationPrompt::class)
        ->name('verification.notice');
    Route::get('verify-email/{id}/{hash}', VerifyEmail::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');
});

Route::group(['middleware' => ['auth', 'verified', HasRoleUserMiddleware::class]], function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/profile', Profile::class)->name('profile');
    Route::get('/exam-grade', ExamGrade::class)->name('exam-grade');
    Route::get('/bill', Bill::class)->name('bill');
    Route::get('/invoice', Invoice::class)->name('invoice');
    Route::post(
        '/program/{program}/checkout',
        [PaymentController::class, 'checkout']
    )->name('program.checkout');

    Route::get('/transaction/success', PaymentSuccess::class)->name('payment.success');
    Route::get('/transaction/pending', PendingPayment::class)->name('payment.pending');
    Route::get('/transaction/failed', FailedPayment::class)->name('payment.failed');
    Route::get('/check-order-status', [PaymentController::class, 'checkOrderStatus'])->name('check.order.status');
    Route::post('/save-error-data', [PaymentController::class, 'saveErrorData'])->name('save_error_data');

});

Route::post('/payment/midtrans-callback', [PaymentController::class, 'midtransCallback'])->name('midtrans.callback');

// Route::get('/customer/orders', [App\Http\Controllers\Customer\OrderController::class, 'index'])->name('customer.orders.index');
// Route::get('/customer/orders/{order}', [App\Http\Controllers\Customer\OrderController::class, 'show'])->name('customer.orders.show');
// Route::post('/payment/midtrans-callback', [App\Http\Controllers\PaymentController::class, 'midtransCallback']);
