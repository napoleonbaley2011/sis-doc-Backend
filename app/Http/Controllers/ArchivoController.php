<?php

namespace App\Http\Controllers;

use App\Models\Archivo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArchivoController extends Controller
{
    public function mandar(Request $usuario)
    {
        $RolUsuario = $usuario['rolenviar'];
        $id_documento = $usuario['id'];
        $archivo = Archivo::where('id_documento', $id_documento)->paginate(25);

        if ($RolUsuario == 'admin') {
            //dump($archivo);
            return inertia('Archivos/vistaAdmin', [
                'archivos' => $archivo,
                'iddoc' => $id_documento
            ]);
        } else {
            //dump($archivo);
            return inertia('Archivos/vistaEditor', [
                'archivos' => $archivo,
                'iddoc' => $id_documento
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
            $nuevo_archivo-> version = $nuevaVersion;
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
}
