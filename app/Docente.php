<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    protected $table = 'docentes';

    protected $fillable =[
        'nombre',
        'numero_de_empleado',
        'telefono',
        'edad',
        'fecha_de_ingreso',
    ];
}
