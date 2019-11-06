<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grasa extends Model
{
    protected $table = 'grasa_corporal';

    protected $fillable =[
        'pc_tricipital',
        'pc_infraescapular',
        'pc_supra_iliaco',
        'pc_biciptal',
        'edad',
        'fecha_de_ingreso',
        'imc',
        'grasa',
        'leyenda',
        'tipo'

    ];



}
