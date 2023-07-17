<?php

use App\Http\Controllers\Auth\Company\LoginController as CompanyLoginController;
use App\Http\Controllers\Auth\Company\PasswordResetController as CompanyPasswordResetController;
use App\Http\Controllers\Auth\Company\RegisterController;
use App\Http\Controllers\Company\HomeController as CompanyHomeController;
use App\Http\Controllers\Rsa\Company\CompanyController;
use App\Http\Controllers\Rsa\LanguageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Rsa\Exchange\ExchangeRateController;
use App\Http\Controllers\Auth\Rsa\RsaLoginController;
use App\Http\Controllers\Rsa\HomeController as RsaHomeController;
use App\Http\Controllers\Auth\Rsa\PasswordResetController as RsaPasswordResetController;
use App\Http\Controllers\Rsa\DistanceMapController;
/*Uzak repoda olmayan yollar*/
use App\Http\Controllers\Member\HomeController as MemberHomeController;
use App\Http\Controllers\Auth\Member\LoginController as MemberLoginController;
use App\Http\Controllers\Auth\Member\RegisterController as MemberRegisterController;
use App\Http\Controllers\Auth\Member\MemberController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    return view('front.index');
});
Route::get('/car-list', function () {
    return view('front.car-list');
});
Route::get('/car-detail', function () {
    return view('front.car-detail');
});
Route::get('/reservation', function () {
    return view('front.reservation');
});
Route::get('/contact', function () {
    return view('front.contact');
});
Route::get('/login', function () {
    return view('front.login');
});
Route::get('/register', function () {
    return view('front.register');
});
Route::get('/checkout', function () {
    return view('front.checkout');
});
Route::get('/shopping', function () {
    return view('front.shopping');
});
Route::get('/about', function () {
    return view('front.about');
});
Route::get('/blog', function () {
    return view('front.blog');
});
Route::get('/blog-detail', function () {
    return view('front.blog-detail');
});
Route::get("company-pre-register", [RegisterController::class, "create"])->name("company-pre-register");
Route::post("company-pre-register", [RegisterController::class, "store"]);

Route::get('/admin', function () {
    return view('layouts.admin');
})->name('layouts.admin');

Route::prefix('company')->middleware("auth:company")->group(function () {
    Route::get("/", [CompanyHomeController::class, "index"])->name('company.index');

    Route::get("pre-confirm-list", [CompanyController::class, "preConfirmList"])->name('company.preConfirm.list');

    Route::post('pre-confirm', [CompanyController::class, 'preConfirm'])->name('company.preConfirm');

    Route::post('logout', [CompanyLoginController::class, "logout"])->name("auth.company.logout");
});

Route::prefix('company')->group(function () {

    Route::get('login', [CompanyLoginController::class, "show"])->name("auth.company.login");
    Route::post('login', [CompanyLoginController::class, "login"]);

    Route::get('create-password', function () {
        return view('email.create-password');
    })->name('company.create-password.email');

    Route::get('user-welcome', function () {
        return view('email.company.user-welcome');
    })->name('company.user-welcome.email');

    Route::get("parola-sifirla", [CompanyPasswordResetController::class, "showResetPassword"])->name("company.resetPassword");
    Route::post("parola-sifirla", [CompanyPasswordResetController::class, "sendResetPassword"]);

    Route::get("parola-sifirla/{token}", [CompanyPasswordResetController::class, "showResetPasswordAssign"])->name("company.resetPassword.assign");
    Route::post("parola-sifirla/{token}", [CompanyPasswordResetController::class, "resetPasswordAssign"]);

    Route::get("parola-guncelle/{token}", [CompanyPasswordResetController::class, "showPasswordUpdate"])->name("company.passwordUpdate.token");
    Route::post("parola-guncelle/{token}", [CompanyPasswordResetController::class, "passwordUpdate"]);

});


Route::get('rsa/login', [RsaLoginController::class, "show"])->name("auth.rsa.login");
Route::post('rsa/login', [RsaLoginController::class, "login"]);

Route::get("password-reset", [RsaPasswordResetController::class, "showResetPassword"])->name("rsa.resetPassword");
Route::post("password-reset", [RsaPasswordResetController::class, "sendResetPassword"]);
Route::get("password-reset/{token}", [RsaPasswordResetController::class, "showResetPasswordAssign"])->name("rsa.resetPassword.assign");
Route::post("password-reset/{token}", [RsaPasswordResetController::class, "resetPasswordAssign"]);
Route::get("password-update/{token}", [RsaPasswordResetController::class, "showPasswordUpdate"])->name("rsa.passwordUpdate.token");
Route::post("password-update/{token}", [RsaPasswordResetController::class, "passwordUpdate"]);

Route::prefix('rsa')->middleware(["auth:rsa", "auth.rsa"])->group(function () {
    Route::get('/', [RsaHomeController::class, 'index'])->name('rsa.index');

    Route::get('/languages', [LanguageController::class, 'index'])->name('language.index');
    Route::get('/languages/create', [LanguageController::class, 'create'])->name('language.create');
    Route::post('/languages/create', [LanguageController::class, 'store']);
    Route::patch('/languages/change-status', [LanguageController::class, 'changeStatus'])->name('language.change-status');
    Route::get('/languages/{id}/edit', [LanguageController::class, 'edit'])->name('language.edit')->whereNumber('id');
    Route::post('/languages/{id}/edit', [LanguageController::class, 'update'])->whereNumber('id');

    Route::get('/exchange-rate/{currency_code}/history', [ExchangeRateController::class, 'showHistory'])->name("exchange.history");

    Route::get("exchange-rates-list", [ExchangeRateController::class, "show"])->name('exchange.exchangeRates.list');
    Route::get('/exchange-rate/create', [ExchangeRateController::class, 'create'])->name('exchange.create');
    Route::post('/exchange-rate/create', [ExchangeRateController::class, 'store']);
    Route::post('/exchange-rate/change-status', [ExchangeRateController::class, 'changeStatus'])->name('exchange.change-status');
    Route::get('exchange-rate/{id}/edit', [ExchangeRateController::class, 'edit'])->name('exchange.exchangeRates.edit')->whereNumber('id');
    Route::post('exchange-rate/{id}/edit', [ExchangeRateController::class, 'update'])->whereNumber('id');
    Route::post('/logout', [RsaLoginController::class, 'logout'])->name('auth.rsa.logout');
});
Route::post('/map', [DistanceMapController::class, 'store'])->name('map');
Route::get('/map/place', [DistanceMapController::class, 'getPlace'])->name('get-place');

/*uzak repoda olmayan route'lar*/

Route::get('/', [MemberHomeController::class, 'index'])->name('front.index');

Route::get('/giris', [MemberLoginController::class, 'showLogin'])->name('auth.member.login');
Route::post('/giris', [MemberLoginController::class, 'login']);
Route::get('/kayit-ol', [MemberRegisterController::class, 'showRegister'])->name('member.register');
Route::post('/kayit-ol', [MemberRegisterController::class, 'register']);
Route::post('/logout', [MemberLoginController::class, "logout"])->name("auth.member.logout");


//Sedat Route İşlemleri Start
Route::get('/members',[MemberController::class, 'index'])->name('members');
Route::get('/uye/dogrulama/{token}', [MemberRegisterController::class, 'verify'])->name('member.verify-token');

Route::get('/auth/{driver}/callback',[MemberRegisterController::class, 'socialVerify'])->name('social-verify');
Route::get( '/auth/{driver}',[MemberRegisterController::class, 'socialLogin'])->name('social-login');
Route::prefix("uye")->middleware(['auth:member','auth.member'])->group(function(){
    Route::get('/', [MemberHomeController::class, 'index'])->name('member.front.index');
    Route::get('/profile/{member:id}/edit',[MemberHomeController::class, 'edit'])->name('member.edit');
    Route::post('/profile/{member:id}/edit',[MemberHomeController::class, 'update'])->whereNumber('id');
});

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
