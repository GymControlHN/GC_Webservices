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
        'id_diagnostico',
        'mvo',
        'mvoreal',
        "id_cliente",
        "mvodiagnostico"
        ];

    public function diagnostico()
    {
        return $this->belongsTo('App\Ruffier',"id_diagnostico");//modelo
    }
}

