<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes_gym';
    protected $primaryKey = 'id';
    protected $fillable =[
        'nombre',
        'edad',
        'numero_de_cuenta',
        'numero_de_empleado',
        'numero_de_identidad',
        'profesion_u_oficio',
        'fecha_de_ingreso',
        'carrera',
        'tipo',
        'genero ',
        'telefono'
    ];
}

