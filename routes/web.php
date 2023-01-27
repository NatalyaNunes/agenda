<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AgendaController;

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

Route::get('/', [LoginController::class,"login"]);;

Route::post('/usuario/cadastrar',[LoginController::class, 'cadastrar']);

Route::post('/usuario/login',[LoginController::class, 'autenticar']); 

Route::get('/usuario/deslogar', [LoginController::class, 'deslogar']);

/** AGenda */

Route::get('/agenda/minha', [AgendaController::class, 'minha'])->middleware('somenteUsuarios');

Route::post('/contato/cadastrar', [AgendaController::class, 'novoContato'])->middleware('somenteUsuarios');