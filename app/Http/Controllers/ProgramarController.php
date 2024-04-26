<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Documento;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class ProgramarController extends Controller
{
    public function index()
    {
        $fechaActual = Carbon::now();
        $documentos = DB::select("
        SELECT xd.id, xc.nombre_categoria, xd.fecha_creacion, xd.fecha_modificacion, xd.estado_doc, xt.tipo_documento, tmp.cantidad FROM documentos xd, categorias xc, tipo_de__documentos xt, (SELECT d.id AS id_documento, IFNULL(COUNT(a.id), 0) AS cantidad FROM documentos d LEFT JOIN archivos a ON d.id = a.id_documento GROUP BY d.id)tmp WHERE xd.id_categoria = xc.id AND xd.id_tipo = xt.id AND tmp.id_documento = xd.id ORDER BY xd.id DESC;
        ");

        foreach ($documentos as $documento) {
            if ($documento->fecha_modificacion < $fechaActual->toDateString()) {
                $documento->estado_doc = 0;
            }
        }
        $documentosEstado0 = collect($documentos)->where('estado_doc', 0);
        $hayDocumentosEstado0 = $documentosEstado0->isNotEmpty();
        /**
         dump($hayDocumentosEstado0);
        //
        //return $documento;
        return inertia('Programar/programar', ['documentos' => $documento]);
        $etiqueta = Etiqueta::where('id_categoria', $idCategoria['nombreBoton'])->paginate(25);
        return inertia('Documentos/categoriasList',['etiquetas' => $etiqueta]);
        return inertia('Programar/programar', ['documentos' => $documento]);
         */
        return inertia('Programar/programar',[
            'documentos' => $documentos,
            'hayDocumentosEstado0' => $hayDocumentosEstado0,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //return $request;
        $num = $request->input('id'); // Obtener la ID de la solicitud
        $numetiqueta = $request->input('idetiqueta');
       
        return inertia('Documentos/programar', ['num' => $num, 'etiqueta' =>$numetiqueta] );

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //return $request;
         
        $idetiqueta = $request['etiqueta'];
        $validateData = $request->validate([
            'fechaSubida'=>'required',
            'fechaEntrega'=> 'required',
            'comentarios'=> 'required',
            'tipodoc'=> 'required',
            'nombre'=> 'required',
            'categoria'=> 'required',
            'id_user'=> 'required'
        ]);
        $documento = new Documento();
        $documento->estado_doc = 1;
        $documento->fecha_creacion = $validateData['fechaSubida'];
        $documento->fecha_modificacion = $validateData['fechaEntrega'];
        $documento->id_users = $validateData['id_user'];
        $documento->id_tipo = $validateData['tipodoc'];
        $documento->id_categoria = $validateData['categoria'];
        $documento->titulo_documento = $validateData['comentarios'];
        $documento->save();

        ///////////////////////
        $iddocumento = $documento->id;


        $consulta = DB::insert("insert into documento_etiqueta(id_documento, id_etiqueta)values($iddocumento,$idetiqueta)");
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
