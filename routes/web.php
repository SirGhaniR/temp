<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\StatController;
use App\Http\Controllers\Admin\WhyChooseCardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JoinController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');

Route::post('/join', [JoinController::class, 'store'])
    ->middleware('throttle:5,1')
    ->name('join.store');

Route::middleware('auth')->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('index');

        Route::get('/stats', [StatController::class, 'index'])->name('stats.index');
        Route::get('/stats/{stat}/edit', [StatController::class, 'edit'])->name('stats.edit');
        Route::post('/stats/{stat}', [StatController::class, 'update'])->name('stats.update');

        Route::get('/why-choose', [WhyChooseCardController::class, 'index'])->name('why-choose.index');
        Route::get('/why-choose/{whyChoose}/edit', [WhyChooseCardController::class, 'edit'])->name('why-choose.edit');
        Route::post('/why-choose/{whyChoose}', [WhyChooseCardController::class, 'update'])->name('why-choose.update');
    });
});

require __DIR__.'/auth.php';
