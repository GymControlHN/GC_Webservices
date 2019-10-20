<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    protected $table = 'docentes';
    protected $primaryKey='id';

    protected $fillable =[
        'nombre',
        'numero_de_empleado',
        'telefono',
        'edad',
        'fecha_ingreso',
    ];
}
