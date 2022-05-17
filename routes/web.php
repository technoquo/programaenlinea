<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NivelesController;
use App\Http\Controllers\SemanasController;
use App\Http\Controllers\FallBackController;
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
    return view('welcome');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/niveles',NivelesController::class);


Route::prefix('/niveles')->group(function(){      
    // Route::get('/{id}', [NivelesController::class, 'show'])->name('blog.show');
       Route::get('/create', [NivelesController::class, 'create'])->name('nivel.create');
       
    // Route::get('/edit/{id}', [NivelesController::class, 'edit'])->name('blog.edit');
    // Route::patch('/{id}', [NivelesController::class, 'update'])->name('blog.update');
    // Route::delete('/{id}', [NivelesController::class, 'destroy'])->name('blog.destroy');
  });

  Route::resource('/semanas',SemanasController::class);

  Route::prefix('/semanas')->group(function(){   
     
        Route::get('/', [SemanasController::class, 'index']);
        Route::post('/AgregarPlan', [SemanasController::class, 'AgregarPlan']);
    // Route::get('/{id}', [NivelesController::class, 'show'])->name('blog.show');
    //   Route::get('/create', [SemanasController::class, 'create'])->name('semanas.create');
       
    // Route::get('/edit/{id}', [NivelesController::class, 'edit'])->name('blog.edit');
    // Route::patch('/{id}', [NivelesController::class, 'update'])->name('blog.update');
    // Route::delete('/{id}', [NivelesController::class, 'destroy'])->name('blog.destroy');
  });

  Route::fallback(FallbackController::class);