<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WorkshopRegistrationController;

Route::get('/', [WorkshopRegistrationController::class, 'index'])->name('workshop.landing');
Route::get('/register', [WorkshopRegistrationController::class, 'showForm'])->name('workshop.register.form');
Route::post('/register', [WorkshopRegistrationController::class, 'register'])->name('workshop.register.submit');

// Admin routes with passkey protection
Route::middleware('admin.passkey')->group(function () {
    Route::get('/admin/registrations', [WorkshopRegistrationController::class, 'showRegistrations'])->name('workshop.admin.registrations');
    Route::get('/admin/export', [WorkshopRegistrationController::class, 'exportToExcel'])->name('workshop.admin.export');
    
    // CRUD operations for registrations
    Route::get('/admin/registrations/create', [WorkshopRegistrationController::class, 'create'])->name('workshop.admin.create');
    Route::post('/admin/registrations', [WorkshopRegistrationController::class, 'store'])->name('workshop.admin.store');
    Route::get('/admin/registrations/{id}/edit', [WorkshopRegistrationController::class, 'edit'])->name('workshop.admin.edit');
    Route::put('/admin/registrations/{id}', [WorkshopRegistrationController::class, 'update'])->name('workshop.admin.update');
    Route::delete('/admin/registrations/{id}', [WorkshopRegistrationController::class, 'destroy'])->name('workshop.admin.destroy');
    Route::get('/admin/registrations/{id}', [WorkshopRegistrationController::class, 'show'])->name('workshop.admin.show');
});

// Admin logout route (clear session)
Route::get('/admin/logout', function () {
    session()->forget('admin_authenticated');
    return redirect()->route('workshop.landing')->with('message', 'Logged out successfully');
})->name('workshop.admin.logout');
