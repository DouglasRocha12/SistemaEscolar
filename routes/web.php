<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\AuthUser;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');


Route::get('/home', [AuthUser::class, 'home']);
Route::get('/aluno/cadastrar', [AuthUser::class, 'alunos_cadastrar']);
Route::get('/aluno/lista', [AuthUser::class, 'alunos_listar']);
Route::get('/curso/cadastrar', [AuthUser::class, 'cursos_cadastrar']);
Route::get('/curso/lista', [AuthUser::class, 'cursos_listar']);