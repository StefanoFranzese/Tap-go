<?php
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\RevisorController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

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




Route::get('/nuovo/annuncio', [AnnouncementController::class, 'createAnnouncement'])->middleware('auth')->name('announcements.create');
Route::get('/annunci/{announcement}', [AnnouncementController::class, 'showAnnouncement', ])->name('announcements.show');
Route::get('/annunci', [AnnouncementController::class, 'index'])->name('announcements.index');




Route::get('/', [FrontController::class, 'homepage'])->name('homepage');
Route::get('/categorie/{category}', [FrontController::class,'categoryShow'])->name('category.show');

//ricerca annuncio
Route::get('/ricerca/annuncio', [FrontController::class, 'searchAnnouncements'])->name('announcements.search');

//Index Revisore
Route::get('/revisor/home',[RevisorController::class, 'index'])->middleware('isRevisor')->name('revisor.index');

//Accetta Annuncio
Route::patch('/accetta/annuncio/{announcement}', [RevisorController::class, 'acceptAnnouncement'])->middleware('isRevisor')->name('revisor.accept_announcement');

//Rifiuta Annuncio
Route::patch('/rifiuta/annuncio/{announcement}', [RevisorController::class, 'rejectAnnouncement'])->middleware('isRevisor')->name('revisor.reject_announcement');

//Richiedi di diventare revisore
Route::get('/richiesta/revisore', [RevisorController::class, 'becomeRevisor'])->middleware('auth')->name('become.revisor');

//Rendi un utente revisore
Route::get('/rendi/revisore/{user}', [RevisorController::class, 'makeRevisor'])->middleware('auth')->name('make.revisor');

// Controlla Email in fase di Registrazione
Route::post('/check-email', [FrontController::class, 'checkEmail'])->name('check-email');

// Cambio Lingua
Route::post('/lingua/{lang}', [FrontController::class, 'setLanguage'])->name('set_language_locale');
