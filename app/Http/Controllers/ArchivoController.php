<?php

namespace App\Http\Controllers;

use App\Models\Archivo;
use Illuminate\Http\Request;

class ArchivoController extends Controller
{
    public function mandar (Request $usuario){
        $RolUsuario = $usuario['rolenviar'];
        $id_documento = $usuario['id'];
        $archivo = Archivo::where('id_documento', $id_documento)->paginate(25);

        if($RolUsuario == 'admin'){
            //dump($archivo);
            return inertia('Archivos/vistaAdmin', [
                'archivos' => $archivo,
                'iddoc' => $id_documento]);
        }else{
            //dump($archivo);
            return inertia('Archivos/vistaEditor', [
                'archivos' => $archivo,
                'iddoc' => $id_documento]);
        }

        
    }

    public function create(Request $id){
        $var = $id['id'];
        return inertia('Archivos/Archivocreate',['iddoc'=>$var]);
        //return $id['id'];
    }

    public function accion(){
        
    }
}
