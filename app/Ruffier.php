<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ruffier extends Model
{
    //
    protected $table='ruffier';

    protected $fillable =[
        'fecha_de_ingreso',
        'pulso_r',
        'pulso_a',
        'pulso_d',
        'ruffiel',
        'clasificacion',
        'mvo2',
        'mvoreal',
        "id_cliente"
        ];
}
