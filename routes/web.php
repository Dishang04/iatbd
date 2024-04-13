<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NotificationController;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\addPetController;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return redirect('show');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('pets', PetController::class)
    ->only ('index', 'store', 'create')
    ->middleware(['auth', 'verified']);

Route::middleware(['auth', 'blocked'])->group(function () {
    Route::get('show', [PetController::class, 'show'])->name('pets.show');
});

Route::get('information/{id}', [PetController::class, 'information'])->name('pets.information');

Route::resource('messages', MessageController::class)
    ->only(['index', 'store', 'edit', 'update', 'destroy'])
    ->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/admin', [AdminController::class, 'showUsers'])->name('admin.adminPage');
    Route::put('/admin/users/{user}/block', [AdminController::class, 'blockUser'])->name('admin.blockUser');
    Route::put('/admin/users/{user}/unblock', [AdminController::class, 'unblockUser'])->name('admin.unblockUser');
    Route::get('/admin/search', [AdminController::class, 'showUsers'])->name('admin.searchUsers');

    Route::post('/pets/{pet}/interest', [PetController::class, 'expressInterest'])->name('pets.interest');
    // Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
    Route::get('/notifications', [NotificationController::class, 'notifications'])->name('notifications.index');
});


Route::get('/pets/filter', [PetController::class, 'filter'])->name('pets.filter');

require __DIR__.'/auth.php';