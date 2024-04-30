<?php

namespace App\Http\Controllers;

use App\Models\Archivo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

use Illuminate\Support\Facades\Storage;

class ArchivoController extends Controller
{
    public function mandar(Request $usuario)
    {
        $RolUsuario = $usuario['rolenviar'];
        $id_documento = $usuario['id'];
        $archivo = Archivo::where('id_documento', $id_documento)->paginate(25);
        $Archivo_etiqueta = DB::select("
        SELECT xe.nombre 
        FROM documento_etiqueta xd, etiquetas xe
        WHERE xd.id_documento = $id_documento
        AND xd.id_etiqueta = xe.id
        ");
        $TipoArchivo = DB::select("
        SELECT xt.tipo_documento 
        FROM documentos xd, tipo_de__documentos xt
        WHERE xd.id = $id_documento
        AND xt.id = xd.id_tipo
        ");
        $cantidad = DB::select("
        SELECT COUNT(*) as cantidad
        FROM archivos
        WHERE id_documento = 7;
        ");    

        if ($RolUsuario == 'admin') {
            //dump($archivo);
            return inertia('Archivos/vistaAdmin', [
                'archivos' => $archivo,
                'iddoc' => $id_documento,
                'etiqueta'=>$Archivo_etiqueta,
                'tipo'=>$TipoArchivo,
            ]);
        } else {
            //dump($archivo);
            return inertia('Archivos/vistaEditor', [
                'archivos' => $archivo,
                'iddoc' => $id_documento,
                'etiqueta'=>$Archivo_etiqueta,
                'tipo'=>$TipoArchivo
            ]);
        }
    }

    public function create(Request $id)
    {
        $var = $id['id'];
        return inertia('Archivos/Archivocreate', ['iddoc' => $var]);
        //return $id['id'];
    }

    public function uploadFile(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:pdf,doc,docx|max:2048',
            'encargado' => 'required|string',
            'comentario' => 'required|string'
        ]);
        if ($request->hasFile('file')) {
            $archivo = $request->file('file');

            // Acceder a las propiedades del archivo:
            $nombreArchivo = $archivo->getClientOriginalName(); // Nombre de archivo original
            $tipoArchivo = $archivo->getClientOriginalExtension(); // Extensión de archivo
            $tamañoArchivo = $archivo->getSize(); // Tamaño del archivo en bytes

            // También puede mover el archivo cargado a una ubicación de almacenamiento:
            $nombreArchivoConExtension = uniqid() . '.' . $tipoArchivo;
            $archivo->storeAs('archivos', $nombreArchivo); // Almacenar en el disco 'archivos'
            // ... procesamiento posterior de los datos del archivo ...

            /*return response()->json([
                'mensaje' => 'Archivo subido exitosamente',
                'nombreArchivo' => $nombreArchivo, // Incluir el nombre de archivo en la respuesta
            ]);*/

            $numero = $request['id'];

            $consulta = DB::select("
            SELECT max(version) as max_version
            FROM archivos
            where id_documento = $numero");

            if (!empty($consulta)) {
                $maxVersion = $consulta[0]->max_version; // Acceder al valor de la versión máxima
                $nuevaVersion = $maxVersion + 1; // Sumar 1 a la versión máxima
                // Hacer algo con $nuevaVersion, como actualizar la base de datos o mostrarla en la interfaz
            } else {
                $nuevaVersion = 1;
            }

            $nuevo_archivo = new Archivo();
            $nuevo_archivo->nombre_archivo = $nombreArchivo;
            $nuevo_archivo->encargado = $request['encargado'];
            $nuevo_archivo->firma = $request['encargado'];
            $nuevo_archivo->estado_archivo = 0;
            $nuevo_archivo->version = $nuevaVersion;
            $nuevo_archivo->comentario = $request['comentario'];
            $nuevo_archivo->id_editor = 2;
            $nuevo_archivo->id_documento = $numero;
            $nuevo_archivo->save();
            return redirect()->route('programar.index');
        } else {
            return response()->json([
                'error' => 'No se seleccionó ningún archivo'
            ]);
        }
    }

    public function obtenerArchivo($id)
    {
        $archivo = Archivo::find($id);

        if (!$archivo) {
            return response()->json(['error' => 'Archivo no encontrado'], 404);
        }

        return response()->json(['contenido' => $archivo->contenido]);
    }

    public function descargarArchivo($filename)
    {
        $archivoPath = storage_path('app/archivos/' . $filename);

        if (!Storage::exists('archivos/' . $filename)) {
            abort(404);
        }

        return response()->download($archivoPath);
    }

    public function aceptar(string $id){
        $archivos = DB::select("
        SELECT xl.id, xc.nombre_categoria, xl.nombre_archivo,xd.fecha_modificacion
        FROM archivos xl, documentos xd, categorias xc
        WHERE xl.id = $id
        AND xl.id_documento = xd.id
        AND xd.id_categoria = xc.id;
        ");
        //return $archivo;
        return inertia('Archivos/formArchivo' ,['archivos' => $archivos]);
    }

    public function store(Request $request)
    {
        $id = $request['id'];
        $estado = $request['estado'];
        $comentario = $request['comentario'];
        //return $comentario;

        $consulta = DB::update("
        UPDATE archivos
        SET estado_archivo = $estado , comentario = '$comentario'
        WHERE id = $id
        ");
        return redirect()->route('programar.index');

    }

    public function index(){
        $archivos = DB::select("
        SELECT x1.id, x1.nombre_archivo, tmp.nombre
        FROM archivos x1, documentos xd, categorias xc , (SELECT xd.id_documento, xe.nombre
												        FROM documento_etiqueta xd, etiquetas xe
												        WHERE xd.id_etiqueta = xe.id)tmp
        WHERE x1.id_documento = xd.id
        AND xd.id_categoria = xc.id
        AND x1.id_documento = tmp.id_documento
        ORDER BY x1.id desc
        ");
        return inertia('Seguimiento/index',['archivos' => $archivos]);
    }

    public function eliminar(string $id){
        //return $id;
        $archivo = DB::select("
        SELECT x1.id, x1.id_documento,x1.nombre_archivo ,tmp.nombre
        FROM archivos x1, ( SELECT xd.id_documento, xe.nombre
                            FROM documento_etiqueta xd, etiquetas xe
                            WHERE xd.id_etiqueta = xe.id )tmp
        WHERE x1.id = $id
        AND x1.id_documento = tmp.id_documento
        ");
        
        $idarchivo= $archivo[0]->id;
        $iddoc= $archivo[0]->id_documento;
        $nombreArchivo= $archivo[0]->nombre_archivo;
        $nombreRespo= $archivo[0]->nombre;

        $consulta = DB::insert("
        INSERT INTO archivo_recuperar(id_archivo,id_documento,nombre_archivo,nombre_etiqueta)values($idarchivo,$iddoc,'$nombreArchivo','$nombreRespo')
        ");

        $eliminado = Archivo::find($id);
        $eliminado ->delete();
        return redirect()->route('archivos.index');
       // return $archivo;
    }

    public function ver(){
       $archivo = DB::select("
       SELECT id, nombre_archivo
       FROM archivos
       WHERE estado_archivo = 1
       ");
       return inertia('Lista',['archivos' => $archivo] );
    }
}
