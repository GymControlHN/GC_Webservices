<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    protected $table = 'docentes';
    protected $appends =["edad"];
    protected $fillable =[
        'nombre',
        'numero_de_empleado',
        'telefono',
        'fecha_nacimiento',
    ];
}
