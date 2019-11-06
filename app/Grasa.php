<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grasa extends Model
{
    protected $table = 'grasa_corporal';

    protected $fillable =[
        'edad',
        'fecha_de_ingreso',
        'imc',
        'grasa',
        'leyenda',
        'tipo'

    ];



}
