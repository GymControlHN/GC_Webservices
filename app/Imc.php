<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imc extends Model
{
    protected $table = 'antecedentes';

    protected $fillable =[
        'peso',
        'altura',
        'imc',
        'leyenda',
        'pecho',
        'brazo',
        'ABD_A',
        'ABD_B',
        'cadera',
        'muslo',
        'pierna',
        'fecha_de_ingreso',
        "id_cliente"
    ];

}
