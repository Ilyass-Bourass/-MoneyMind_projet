<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DepanceController;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/admin', function () {
//     return view('admin.dashboard');
// })->name('admin');

Route::middleware(['auth'])->group(function () {
    
    Route::get('/dashboard_user',[UserController::class,'index'])->name('dashboard_user');
    
   Route::get('/depance',[DepanceController::class,'index'])->name('depance');
   Route::post('/depance/store', [DepanceController::class, 'store'])->name('depance.store');
   Route::delete('/depance/destroy/{depance}', [DepanceController::class, 'destroy'])->name('depance.destroy');

});


Route::middleware(['auth'])->group(function () {
    Route::get('/users', [AdminController::class, 'users'])->name('user');
    Route::delete('/user/destroy/{id}', [AdminController::class, 'destroy'])->name('user.destroy');
    Route::get('/admin/users', [AdminController::class, 'dashbord'])->name('admin');
    Route::get('/categorie',[CategorieController::class,'index'])->name('categorie');
    Route::post('/categorie/store', [CategorieController::class, 'store'])->name('categorie.store');
    Route::get('/categorie/edit/{id}', [CategorieController::class, 'edit'])->name('categorie.edit');
    Route::put('/categorie/update/{id}', [CategorieController::class, 'update'])->name('categorie.update');
    Route::delete('/categorie/destroy/{id}', [CategorieController::class, 'destroy'])->name('categorie.destroy');
});



// Route::get('/admin', function () {
//     return view('admin');
// })->middleware(['auth', 'verified'])->name('admin');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('admin.index', [AdminController::class, 'index'])->name('admin.dashboard');
Route::get('admin.categories', [AdminController::class, 'categories'])->name('admin.categories');
Route::get('admin.users', [AdminController::class, 'users'])->name('admin.users');
Route::get('admin.messages', [AdminController::class, 'messages'])->name('admin.messages');
Route::get('admin.settings', [AdminController::class, 'settings'])->name('admin.settings');

// Routes pour l'administration
// Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
//     Route::get('admin.index', [AdminController::class, 'index'])->name('admin.dashboard');
//     Route::get('/categories', [AdminController::class, 'categories'])->name('admin.categories');
//     Route::get('/users', [AdminController::class, 'users'])->name('admin.users');
//     Route::get('/messages', [AdminController::class, 'messages'])->name('admin.messages');
//     Route::get('/settings', [AdminController::class, 'settings'])->name('admin.settings');
// });



require __DIR__.'/auth.php';
