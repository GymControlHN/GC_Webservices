<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Particular extends Model
{
    protected $table = 'particulares';

    protected $fillable =[
        'nombre',
        'edad',
        'numero_de_identidad',
        'fecha_ingreso',
        'profesion_u_oficio',
        'telefono'
    ];
}
