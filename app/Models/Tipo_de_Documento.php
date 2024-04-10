<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo_de_Documento extends Model
{
    use HasFactory;
    
    protected $guardered = [];

    public function documentos(){
        return $this -> hasMany('documentos');
    }
}
