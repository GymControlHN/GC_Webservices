<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ruffier extends Model
{
    //
    protected $table='ruffier';

    protected $fillable =[
        'pulso_r',
        'pulso_a',
        'pulso_d',
        'ruffiel',
        'leyenda',
        'mvo',
        'mvoreal',
        "id_cliente",
        "mvodiagnostico"
        ];
}
