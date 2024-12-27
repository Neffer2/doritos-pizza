<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
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
})->name('premios')->middleware('ruleta');
Route::get('/puntaje', function () {
    return view('dashboard.puntaje');
})->name('puntaje')->middleware('ruleta');
Route::get('/ranking', [HomeController::class, 'ranking'])->name('ranking')->middleware('ruleta');
Route::get('/registrar_codigo', [HomeController::class, 'registrarCodigo'])->name('registrar_codigo')->middleware('ruleta');
Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard')->middleware('ruleta');

Route::get('/ruleta', [HomeController::class, 'showRuleta'])->name('ruleta')->middleware('participante');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
