<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FaqController;
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
Route::get('/premios', function () {
    return view('dashboard.premios');
})->middleware('ruleta')->name('premios');
Route::get('/puntaje', function () {
    return view('dashboard.puntaje');
})->middleware('ruleta')->name('puntaje');
Route::get('/ranking', [HomeController::class, 'ranking'])->middleware('ruleta')->name('ranking');
Route::get('/registrar_codigo', [HomeController::class, 'registrarCodigo'])->middleware('ruleta')->name('registrar_codigo');
Route::get('/faq', [FaqController::class, 'index'])->middleware('ruleta')->name('faq');
Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->middleware('ruleta')->name('dashboard');

Route::get('/ruleta', [HomeController::class, 'showRuleta'])->middleware('participante')->name('ruleta');
Route::post('/storePuntos', [HomeController::class, 'storePuntos'])->middleware('participante')->name('storePuntos');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
