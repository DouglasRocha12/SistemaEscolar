<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\AuthUser;
use Illuminate\Support\Facades\Redirect;

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
   
    return Redirect('/login');  
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');


Route::get('/home',                 [AuthUser::class, 'home']);


Route::get('/aluno/cadastrar',      [AuthUser::class, 'alunos_cadastrar']);
Route::post('/aluno/cadastrar',     [AuthUser::class, 'alunos_cadastrar_salvar']);
Route::get('/aluno/listar',         [AuthUser::class, 'alunos_listar']);
Route::post('/aluno/listar',        [AuthUser::class, 'alunos_listar_pesquisa']);
Route::get('/aluno/{id}',           [AuthUser::class, 'alunos_visualisar']);
Route::post('/aluno',               [AuthUser::class, 'alunos_visualisar_salvar']);
Route::get('/aluno/deleta/{id}',   [AuthUser::class, 'aluno_deletar']);


Route::get('/curso/cadastrar',      [AuthUser::class, 'cursos_cadastrar']);
Route::post('/curso/cadastrar',     [AuthUser::class, 'cursos_cadastrar_salvar']);
Route::get('/curso/listar',         [AuthUser::class, 'cursos_listar']);
Route::post('/curso/listar',        [AuthUser::class, 'cursos_listar_pesquisa']);
Route::get('/curso/{id}',           [AuthUser::class, 'cursos_visualisar']);
Route::post('/curso',               [AuthUser::class, 'cursos_visualisar_salvar']);
Route::get('/curso/deleta/{id}',   [AuthUser::class, 'cursos_deletar']);

Route::get('/matricular/listar',           [AuthUser::class, 'matricula_listar']);
Route::post('/matricular/listar',           [AuthUser::class, 'matricula_listar_pesquisa']);
Route::get('/matricular/{id}',           [AuthUser::class, 'matricula_visualisar']);
Route::get('/matricular',           [AuthUser::class, 'matricular']);
Route::post('/matricular',           [AuthUser::class, 'matricular_salvar']);
Route::post('/matricular/update',           [AuthUser::class, 'matricula_visualisar_salvar']);
Route::get('/matricular/deleta/{id}',   [AuthUser::class, 'matricula_deletar']);

