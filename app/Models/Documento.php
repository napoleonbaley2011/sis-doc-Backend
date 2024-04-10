<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    use HasFactory;

    protected $guardered = [];

    public function tipo_documento(){
        return $this -> belongsTo('tipo_de__documentos');
    }
    
    public function categoria(){
        return $this -> belongsTo('categorias');
    }

    public function comentarios(){
        return $this -> hasMany('comentarios');
    }

    

}
