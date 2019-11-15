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
        'identificacion',
        'profesion_u_oficio',
        'fecha_de_ingreso',
        'carrera',
        'id_tipo_cliente',
        'genero ',
        'telefono'
    ];
}

