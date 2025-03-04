<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\TurmaController;
use App\Http\Controllers\MatriculaController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;

// Define as rotas de autenticação (login, register, etc.)
Auth::routes();

// Agrupa as rotas que exigem autenticação
Route::middleware(['auth'])->group(function () {
    // Rota inicial
    Route::get('/', function () {
        return view('welcome');
    })->name('home');

    // Rotas de Alunos
    Route::resource('alunos', AlunoController::class);
    Route::get('alunos/search', [AlunoController::class, 'search'])->name('alunos.search');

    // Rotas de Turmas
    Route::resource('turmas', TurmaController::class);

    // Rotas de Matrículas
    Route::resource('turmas.matriculas', MatriculaController::class);

    // Rota home
    Route::get('/home', [HomeController::class, 'index'])->name('home.index');
});
