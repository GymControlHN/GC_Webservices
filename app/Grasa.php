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
        'grasa',
        'id_diagnostico',
        'tipo',
        "id_cliente"

    ];

    public function diagnostico()
    {
        return $this->belongsTo("\App\Grasa","id_diagnostico");
    }


}
