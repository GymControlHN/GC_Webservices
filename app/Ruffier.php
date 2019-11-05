<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ruffier extends Model
{
    //
    protected $table='ruffier';

    protected $fillable =[
        'fecha',
        'pulso_r',
        'pulso_a',
        'pulso_d',
        'ruffier',
        'clasificacion',
        'mvo2',
        'mvoreal'
        ];
}
