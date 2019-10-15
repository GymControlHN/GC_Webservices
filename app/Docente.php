<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    protected $table = 'docentes';

    protected $fillable =[
        'nombre',
        'edad',
        'numero_de_cuenta',
        'fecha_ingreso',
        'carrera',
        'telefono'

    ];
}
