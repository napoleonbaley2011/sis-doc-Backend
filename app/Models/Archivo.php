<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Archivo extends Model
{
    use HasFactory;

    protected $guardered = [];

    public function usuarios(){
        return $this -> belongsTo('users');
    }
    
    public function documento(){
        return $this -> belongsTo('documentos');
    }
}
