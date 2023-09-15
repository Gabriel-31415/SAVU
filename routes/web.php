<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TipoVisitaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VisitaController;
use App\Models\TipoVisita;
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

Route::get('/', function () {
    // $tipoVisita = TipoVisita::find(5);
    // return view('welcome', compact('tipoVisita'));
    return view('welcome');
})->name('welcome');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->prefix('visita')->name('visita.')->group(function () {
    Route::get('/index', [VisitaController::class, 'index'])->name('index');
    Route::get('/minhasVisitas', [VisitaController::class, 'minhasVisitas'])->name('minhasVisitas');
    Route::get('/create/tipovisita', [VisitaController::class, 'createTipoVisita'])->name('createTipoVisita');
    Route::post('/create', [VisitaController::class, 'create'])->name('create');
    Route::post('/store', [VisitaController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [VisitaController::class, 'edit'])->name('edit');
    Route::get('/show/{id}', [VisitaController::class, 'show'])->name('show');
    Route::post('/update/{id}', [VisitaController::class, 'update'])->name('update');
    Route::get('/delete/{id}', [VisitaController::class, 'delete'])->name('delete');
});

Route::middleware('auth')->prefix('tipoVisita')->name('tipoVisita.')->group(function () {
    Route::get('/index', [TipoVisitaController::class, 'index'])->name('index');
    Route::get('/create', [TipoVisitaController::class, 'create'])->name('create');
    Route::post('/store', [TipoVisitaController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [TipoVisitaController::class, 'edit'])->name('edit');
    Route::get('/show/{id}', [TipoVisitaController::class, 'show'])->name('show');
    Route::post('/update/{id}', [TipoVisitaController::class, 'update'])->name('update');
    Route::get('/delete/{id}', [TipoVisitaController::class, 'delete'])->name('delete');
});

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/solicitacoes', [AdminController::class, 'solicitacoes'])->name('solicitacoes');
    Route::get('/aprovar/{id}', [AdminController::class, 'aprovar'])->name('aprovar');
    Route::get('/reprovar/{id}', [AdminController::class, 'reprovar'])->name('reprovar'); 
});

Route::middleware('auth')->prefix('professor')->name('professor.')->group(function () {
    Route::get('/solicitar', [AdminController::class, 'solicitar'])->name('solicitar');
   
});


require __DIR__.'/auth.php';
