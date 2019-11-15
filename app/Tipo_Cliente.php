<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo_Cliente extends Model
{
    protected $table="tipo_clientes";
    protected $fillable =["descripcion"];
}
