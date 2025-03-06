<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DepanceController;
use App\Http\Controllers\ListeSouhaitController;
use App\Http\controllers\GestionRevenusController;
use App\Models\Depance;
use App\Mail\SalaireReçuMail;

use Illuminate\Support\Facades\Mail;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/admin', function () {
//     return view('admin.dashboard');
// })->name('admin');

Route::middleware(['auth'])->group(function () {
    
   Route::get('/dashboard_user',[UserController::class,'index'])->name('dashboard_user');

   Route::get('/GestionRevenus',[GestionRevenusController::class,'index'])->name('gestionRevenus');
   Route::post('/gestionRevenus/store',[GestionRevenusController::class,'store'])->name('gestionRevenus.store');
   Route::get('/gestionRevenus/edit/{id}',[GestionRevenusController::class,'edit'])->name('gestionsRevenus.edit');
   Route::put('/gestionRevenus/update/{gestionRevenu}',[GestionRevenusController::class,'update'])->name('gestionRevenus.update');
   Route::delete('/getsionsRevenus/destroy/{id}',[GestionRevenusController::class,'destroy'])->name('gestionsRevenus.destroy');

   Route::get('/depance',[DepanceController::class,'index'])->name('depance');
   Route::post('/depance/store', [DepanceController::class, 'store'])->name('depance.store');
   Route::delete('/depance/destroy/{depance}', [DepanceController::class, 'destroy'])->name('depance.destroy');

   Route::get('/listeSouhait',[ListeSouhaitController::class,'index'])->name('listeSouhait');
   Route::post('/listeSouhait/store', [ListeSouhaitController::class, 'store'])->name('listeSouhait.store');
   Route::delete('/listeSouhait/destroy/{id}', [ListeSouhaitController::class, 'destroy'])->name('listeSouhait.destroy');

   Route::get('/get-depance-par-categorie', function() {

        $depenses =Depance::get_depance_par_categorie();
        return response()->json($depenses);

})->middleware('auth');
        
Route::get('/suggestion-ai',[DepanceController::class,'suggestionAi'])->name('suggestion-ai');
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

// Route::get('/test-email', function () {
//     Mail::to('ilyassali223@gmail.com')->send(new SalaireReçuMail('ilyass', 2500,6000));

//     return "Email envoyé avec succès !";
// });

require __DIR__.'/auth.php';
