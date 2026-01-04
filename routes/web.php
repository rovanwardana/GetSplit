<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HelpController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\TncController;
use App\Http\Controllers\PrivacyController;
use App\Http\Controllers\CookiesController;

// Route untuk guest
Route::get('/', function () {
    return view('index'); 
})->name('home');

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

// Route yang memerlukan autentikasi
Route::middleware('auth')->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

    // Transaction routes
    Route::get('/transaction', [TransactionController::class, 'index'])->name('transaction.index');
    Route::post('/transaction', [TransactionController::class, 'store'])->name('transaction.store');
    Route::post('/transaction/update-statuses', [BillController::class, 'updateParticipantStatuses']);
    Route::delete('/transaction/{id}', [BillController::class, 'destroy'])->name('transaction.destroy');

    // Bill routes
    Route::get('/bills/create', [BillController::class, 'create'])->name('bills.create');
    Route::post('/bills', [BillController::class, 'store'])->name('bills.store');

    // Profile routes
    Route::get('/profile', [UserController::class, 'edit'])->name('profile');
    Route::put('/profile', [UserController::class, 'update'])->name('profile.update');

    // Help routes
    Route::get('/help', [HelpController::class, 'index'])->name('help');
    Route::get('/help/faq', [FaqController::class, 'index'])->name('faq');
    Route::get('/help/tnc', [TncController::class, 'index'])->name('tnc');
    Route::get('/help/privacy', [PrivacyController::class, 'index'])->name('privacy');
    Route::get('/help/cookies', [CookiesController::class, 'index'])->name('cookies');

    // Logout route
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
