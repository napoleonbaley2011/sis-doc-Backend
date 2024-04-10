<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;

    protected $guardered = [];

    public function documentos(){
        return $this -> belongsTo('documentos');
    }

}
