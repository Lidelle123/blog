<?php

use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\authenticate\CommentController;
use App\Http\Controllers\guest\AnnonceController;
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

Route::get('/', [AnnonceController::class, "showAll"])->name('showAnnonce');

Route::name('annonce.')->group(function () {
    Route::get('/publish', [AnnonceController::class, "publish"])->name('publish');
});

Route::post('publish/save', [AnnonceController::class, 'store'])->name('store');

Route::name('auth.')->group(function () {
    Route::get('/register', [AuthController::class, "registerForm"])->name('register');
    Route::post('/save', [AuthController::class, "store"])->name('store');
    Route::post('/login', [AuthController::class, "login"])->name('login');
    Route::get('/logout', [AuthController::class, "logout"])->name('logout');
});

Route::post('/addComment', [CommentController::class, 'add'])->name('addComment');
Route::get('/annonce/{id}/edit', [AnnonceController::class, 'modifyForm'])->name('editAnnonce');
Route::match(['post', 'put'], 'annonce/{id}/update', [AnnonceController::class, 'update'])->name('updateAnnonce');
Route::match(['post', 'put'], 'annonce/{id}/delete', [AnnonceController::class, 'delete'])->name('deleteAnnonce');
