<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Foundation\Application;
use Inertia\Inertia;
use App\Models\Archivo;
use Illuminate\Support\Facades\DB;
class DashboardController extends Controller
{
    public function index(){
        return Inertia::render('Welcome', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
        ]);
    }

    public function dashboard(){
        $archivo = DB::select("
        SELECT 
            c.nombre_categoria AS nombre_categoria, 
            COUNT(CASE WHEN a.estado_archivo = 2 THEN a.id ELSE NULL END) AS cantidad_archivos_revisados,
            COUNT(CASE WHEN a.estado_archivo IN (0, 1) THEN a.id ELSE NULL END) AS cantidad_archivos_sin_revisar,
            COALESCE(COUNT(a.id), 0) AS total_archivos
        FROM categorias c
        LEFT JOIN documentos d ON c.id = d.id_categoria
        LEFT JOIN archivos a ON d.id = a.id_documento
        GROUP BY c.nombre_categoria
        ORDER BY c.nombre_categoria;
        ");
        return Inertia::render('Dashboard')->with('archivos',$archivo);
    }
    public function dashboardEditor(){
        return Inertia::render('DashboradEditor');
    }
}
