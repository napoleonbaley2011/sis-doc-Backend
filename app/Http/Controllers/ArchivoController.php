<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArchivoController extends Controller
{
    public function mandar (Request $usuario){
        $RolUsuario = $usuario['rolenviar'];
        $id_documento = $usuario['id'];
        if($RolUsuario == 'admin'){
            return inertia('Archivos/vistaAdmin', ['documentos' => $id_documento]);
        }else{
            return inertia('Archivos/vistaEditor', ['documentos' => $id_documento]);
        }

        
    }
}
