<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    protected $table = 'estudiantes';
    protected $appends =["edad"];
    protected $fillable =[
       'nombre',
        'fecha_nacimiento',
        'numero_de_cuenta',
        'fecha_de_ingreso',
        'carrera',
        'telefono'
    ];

}

