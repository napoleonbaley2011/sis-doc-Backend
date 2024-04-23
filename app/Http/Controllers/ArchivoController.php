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
            return inertia('Archivos/vistaAdmin', ['archivos' => $archivo]);
        }else{
            //dump($archivo);
            return inertia('Archivos/vistaEditor', ['archivos' => $archivo]);
        }

        
    }

    public function create(){
        return "hola Osita Maleantosa";
    }

    public function accion(){
        
    }
}
