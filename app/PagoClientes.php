<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PagoClientes extends Model
{
    protected $table = 'clientes';

    protected $fillable =[
        'mes',
        'fecha_pago',
        "id_cliente"
    ];
}
