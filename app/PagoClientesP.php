<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PagoClientesP extends Model
{
    protected $table = 'clientesp';

    protected $fillable =[
        'mes',
        'fecha_pago',
        'nota',
        "id_cliente"
    ];
}
