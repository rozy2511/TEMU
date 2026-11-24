<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ItemReportController as AdminItemReportController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\ClaimController as AdminClaimController;
use App\Http\Controllers\User\ItemReportController;
use App\Http\Controllers\User\ClaimController;

Route::get('/', function () {
    return Auth::check()
        ? redirect()->route('dashboard')
        : redirect()->route('login');
});

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
        if (Auth::user()->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        return redirect()->route('user.dashboard');
    })->name('dashboard');

    Route::middleware('role:admin')->prefix('admin')->name('admin.')->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');

        Route::get('/reports', [AdminItemReportController::class, 'index'])
            ->name('reports.index');

        Route::get('/reports/{report}', [AdminItemReportController::class, 'show'])
            ->name('reports.show');

        Route::post('/reports/{report}/hide', [AdminItemReportController::class, 'hide'])
            ->name('reports.hide');

        Route::post('/reports/{report}/unhide', [AdminItemReportController::class, 'unhide'])
            ->name('reports.unhide');

        Route::get('/users', [AdminUserController::class, 'index'])
            ->name('users.index');

        Route::get('/users/{user}', [AdminUserController::class, 'show'])
            ->name('users.show');

        Route::get('/claims', [AdminClaimController::class, 'index'])
            ->name('claims.index');

        Route::get('/claims/{claim}', [AdminClaimController::class, 'show'])
            ->name('claims.show');

        Route::delete('/claims/{claim}', [AdminClaimController::class, 'destroy'])
            ->name('claims.destroy');

    });

    Route::middleware('role:user')->prefix('user')->name('user.')->group(function () {

        Route::get('/dashboard', [ItemReportController::class, 'home'])
            ->name('dashboard');

        Route::get('/reports', [ItemReportController::class, 'index'])
            ->name('reports.index');

        Route::get('/reports/create', [ItemReportController::class, 'create'])
            ->name('reports.create');

        Route::post('/reports', [ItemReportController::class, 'store'])
            ->name('reports.store');

        Route::get('/reports/{report}/matches', [ItemReportController::class, 'matches'])
            ->name('reports.matches');

        Route::get('/claims', [ClaimController::class, 'myClaims'])
            ->name('claims.my');

        Route::post('/reports/{report}/claims', [ClaimController::class, 'store'])
            ->name('reports.claims.store');

        Route::get('/reports/{report}/claims', [ClaimController::class, 'index'])
            ->name('reports.claims.index');

        Route::post('/reports/{report}/claims/{claim}/approve', [ClaimController::class, 'approve'])
            ->name('reports.claims.approve');

        Route::post('/reports/{report}/claims/{claim}/reject', [ClaimController::class, 'reject'])
            ->name('reports.claims.reject');

        Route::post('/reports/{report}/claims/{claim}/request-contact', [ClaimController::class, 'requestContact'])
            ->name('reports.claims.request-contact');

        Route::post('/reports/{report}/claims/{claim}/approve-contact', [ClaimController::class, 'approveContact'])
            ->name('reports.claims.approve-contact');

        Route::post('/reports/{report}/claims/{claim}/reject-contact', [ClaimController::class, 'rejectContact'])
            ->name('reports.claims.reject-contact');

        Route::get('/reports/{report}/claims/{claim}/handoff', [ClaimController::class, 'handoff'])
            ->name('reports.claims.handoff');

        Route::post('/reports/{report}/claims/{claim}/confirm-handoff', [ClaimController::class, 'confirmHandoff'])
            ->name('reports.claims.confirm-handoff');

    });

});

require __DIR__.'/auth.php';
