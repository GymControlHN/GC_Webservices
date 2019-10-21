<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    protected $table = 'estudiantes';
    protected $primaryKey='id';

    protected $fillable =[
       'nombre',
        'edad',
        'numero_de_cuenta',
        'fecha_ingreso',
        'tipo_de_cliente',
        'telefono'
    ];
}

