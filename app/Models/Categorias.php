<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categorias extends Model
{
    //
    protected $table = 'm_categorias';
    protected $primaryKey = 'id';
    protected $fillable = ['nombre', 'registro_activo'];
}
