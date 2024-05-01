<?php

use App\Http\Controllers\ArchivoController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DocumentoController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\EtiquetaController;
use App\Http\Controllers\ProgramarController;
use App\Http\Controllers\ReporteController;
use App\Models\Etiqueta;
use Inertia\Inertia;
// No auth Routes
Route::get('/', [DashboardController::class, 'index']);
Route::get('/archivos/ver',[ArchivoController::class,'ver'])->name('archivos.ver');
Route::get('/archivos1/{filename}', [ArchivoController::class, 'descargarArchivo1'])->name('archivos.descargar1');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {
    //Auth Routes
    Route::get('/dashboardeditor', [DashboardController::class, 'dashboardeditor'])->name('dashboardeditor');
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::resource('/documentos', DocumentoController::class);
    Route::resource('/etiquetas', EtiquetaController::class);
    Route::resource('/programar', ProgramarController::class);
    Route::get('/etiquetas/redirigir', [EtiquetaController::class, 'redirigir'])->name('etiquetas.redirigir');
    Route::get('/archivos/mandar', [ArchivoController::class, 'mandar'])->name('archivos.mandar');
    Route::get('/archivos/create', [ArchivoController::class, 'create'])->name('archivos.create');
    Route::post('/archivos/upload', [ArchivoController::class, 'uploadFile'])->name('archivos.upload');
    Route::get('/archivos/obtener-archivo/{id}', [ArchivoController::class, 'obtenerArchivo'])->name('archivos.obtener');
    Route::get('/archivos/{filename}', [ArchivoController::class, 'descargarArchivo'])->name('archivos.descargar');
    Route::get('/archivos/aceptar/{id}', [ArchivoController::class, 'aceptar'])->name('archivos.aceptar');
    Route::post('/archivos/store', [ArchivoController::class, 'store'])->name('archivos.store');
    Route::get('/archivos',[ArchivoController::class, 'index'])->name('archivos.index');
    Route::delete('/archivos/eliminar/{id}',[ArchivoController::class, 'eliminar'])->name('archivos.eliminar');
    Route::resource('/reporte', ReporteController::class);

});
