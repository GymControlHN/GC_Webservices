<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes_gym';
    protected $primaryKey = 'id';

    protected $appends =["edad"];
    protected $fillable =[
        'nombre',
        'fecha_nacimiento',
        'identificacion',
        'profesion_u_oficio',
        'fecha_de_ingreso',
        'id_carrera',
        'id_tipo_cliente',
        'genero',
        'telefono'
    ];

    public function getEdadAttribute(){
        $anioActual= Carbon::now()->format("Y") ;
        $anioEst=date("Y",strtotime($this->fecha_nacimiento));
        return   "".$anioActual-$anioEst;
    }
}

