<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminAuth;
use Laravel\Socialite\Facades\Socialite;

use App\Http\Controllers\{
    PlayerController,
    MappoolController,
    ScheduleController,
    OsuAuthController
};

use App\Http\Controllers\Admin\{
    AdminController,
    AdminAuthController,
    StageController,
    MappoolController as AdminMappoolController,
    MatchController,
    PlayerController as AdminPlayerController,
};

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/info', function () {
    return view('info');
})->name('info');

Route::get('/players', [PlayerController::class, 'index'])->name('players');

Route::get('/mappools', [MappoolController::class, 'index'])->name('mappools');
Route::post('/mappools/change-stage', [MappoolController::class, 'changeStage'])->name('mappools.changeStage');

Route::get('/schedules', [ScheduleController::class, 'index'])->name('schedules');
Route::post('/schedules/change-stage', [ScheduleController::class, 'changeStage'])->name('schedules.changeStage');

// osu auth
Route::get('/login/osu', function () {
    return Socialite::driver('osu')->redirect();
})->name('osuLogin');
Route::get('auth/osu/callback', [OsuAuthController::class, 'handleCallback']);
Route::post('/logout', [OsuAuthController::class, 'logout'])->name('logout');

// admin pages
Route::prefix('admin')->name('admin.')->middleware(AdminAuth::class)->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::resource('stages', StageController::class)->names('stage')->except(['show', 'create']);
    Route::resource('mappools', AdminMappoolController::class)->names('mappool')->except(['show', 'create']);
    Route::resource('players', AdminPlayerController::class)->names('player')->only(['index', 'store', 'destroy']);
    Route::resource('matches', MatchController::class)->names('match')->except(['show', 'create']);
    
    Route::get('register', [AdminAuthController::class, 'showRegisterForm'])->name('register');
    Route::post('register', [AdminAuthController::class, 'register'])->name('register.post');
    Route::get('login', [AdminAuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AdminAuthController::class, 'login'])->name('login.post');
    Route::post('logout', [AdminAuthController::class, 'logout'])->name('logout');
});