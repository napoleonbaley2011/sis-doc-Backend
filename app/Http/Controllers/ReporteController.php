<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ReporteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
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
        //return $archivo;
        return inertia('Seguimiento/reporte',['archivos'=>$archivo]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
