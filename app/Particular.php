<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Particular extends Model
{
    protected $table = 'particulares';
    protected $appends =["edad"];

    protected $fillable =[
        'nombre',
        'fecha_nacimiento',
        'numero_de_identidad',
        'profesion_u_oficio',
        'telefono'
    ];
}
