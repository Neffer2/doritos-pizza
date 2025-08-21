<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\BackofficeController;
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

// Rutas del backoffice - protegidas con middleware backoffice
Route::prefix('backoffice')->name('backoffice.')->middleware(['auth', 'backoffice'])->group(function () {
    Route::get('/', [BackofficeController::class, 'dashboard'])->name('dashboard');
    Route::get('/ranking', [BackofficeController::class, 'ranking'])->name('ranking');
    Route::get('/estado-usuarios', [BackofficeController::class, 'estadoUsuarios'])->name('estado-usuarios');
    Route::get('/informacion-usuarios', [BackofficeController::class, 'informacionUsuarios'])->name('informacion-usuarios');
    Route::get('/estadisticas', [BackofficeController::class, 'estadisticas'])->name('estadisticas');
    Route::get('/usuario/{usuario}', [BackofficeController::class, 'verUsuario'])->name('ver-usuario');
    Route::patch('/usuario/{usuario}/estado', [BackofficeController::class, 'actualizarEstado'])->name('actualizar-estado');
});

// Rutas públicas existentes - con middleware de redirección por tipo de usuario
Route::middleware(['auth', 'verified', 'redirect.user.type'])->group(function () {
    Route::get('/', function () {
        return view('dashboard');
    })->middleware('ruleta')->name('dashboard');
    
    Route::get('/premios', function () {
        return view('dashboard.premios');
    })->middleware('ruleta')->name('premios');
    
    Route::get('/puntaje', function () {
        return view('dashboard.puntaje');
    })->middleware('ruleta')->name('puntaje');
    
    Route::get('/ranking', [HomeController::class, 'ranking'])->middleware('ruleta')->name('ranking');
    Route::get('/registrar_codigo', [HomeController::class, 'registrarCodigo'])->middleware('ruleta')->name('registrar_codigo');
    Route::get('/faq', [FaqController::class, 'index'])->middleware('ruleta')->name('faq');
});

Route::get('/ruleta', [HomeController::class, 'showRuleta'])->middleware(['auth', 'participante', 'redirect.user.type'])->name('ruleta');
Route::post('/storePuntos', [HomeController::class, 'storePuntos'])->middleware(['auth', 'participante', 'redirect.user.type'])->name('storePuntos');

Route::middleware(['auth', 'redirect.user.type'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
