<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Etiqueta;
use App\Http\Requests\EtiquetaRequest;
use App\Models\Documento;
use Illuminate\Support\Facades\Log;

class EtiquetaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $idCategoria)
    {
        
        $num = $idCategoria['nombreBoton'];    
        $etiqueta = Etiqueta::where('id_categoria', $idCategoria['nombreBoton'])->paginate(25);
        return inertia('Documentos/categoriasList',['etiquetas' => $etiqueta]);
        
        /*return $idCategoria;*/
        
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia('Documentos/create');
        /*return "Loq";*/   
    }

    /**
     * Store a newly created resource in storage.
     * @param App\Http\Requests\EtiquetaRequest
     */
    public function store(Request $request)
    {
       //return $request;

       $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'categoria' => 'required|integer',
        ]);
        
        //return $validatedData;
    
        $etiqueta = new Etiqueta();
        $etiqueta->nombre = $validatedData['name'];
        $etiqueta->id_categoria = $validatedData['categoria'];
        $etiqueta->save();
        return redirect()->route('documentos.index');
        
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
        return $id;
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
        return "$id";
    }
}
