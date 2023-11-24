<?php

// use App\Http\Controllers\ProfileController;
// use App\Http\Controllers\DashboardController;
// use Illuminate\Support\Facades\Route;


// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
// Route::get('/property/details/{referencia}', [DashboardController::class, 'propertyDetails'])->name('property-details');
// Route::get('/okupados', function () {
//     return view('okupados');
// })->middleware(['auth', 'verified'])->name('okupados');
// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__.'/auth.php';

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdministradorUsuariosController;
use App\Http\Controllers\OkupadosController;


use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

// Rutas de administrador
// Route::middleware(['auth', 'isAdmin'])->prefix('admin')->name('admin.')->group(function () {
//     Route::get('/users', [AdminUsersController::class, 'index'])->name('users');
//     Route::get('/users/{user}', [AdminUsersController::class, 'show'])->name('users.show');
// });
Route::get('/admin/users', [AdministradorUsuariosController::class, 'index'])->name('admin.users');


Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/property/details/{referencia}', [DashboardController::class, 'propertyDetails'])->name('property-details');
Route::get('/okupados', [OkupadosController::class, 'showOkupados'])->name('okupados');
// Route::get('/okupados', function () {
//     return view('okupados');
// })->middleware(['auth', 'verified'])->name('okupados');
Route::patch('/users/{user}/change-approval-status', [AdministradorUsuariosController::class, 'changeApprovalStatus'])->name('users.changeApprovalStatus');Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
