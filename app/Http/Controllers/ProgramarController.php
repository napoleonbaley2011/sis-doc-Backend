<?php

namespace App\Http\Controllers;
use App\Models\Documento;
use Illuminate\Http\Request;

class ProgramarController extends Controller
{
    public function index()
    {
        return "loquitos";
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        
        $num = $request->input('id'); // Obtener la ID de la solicitud
        return inertia('Documentos/programar', ['num' => $num]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $request;
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
        return "loquitas";
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

    public function programar()
    {
        return "hola";
    }
}
