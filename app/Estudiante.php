<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    protected $fillable = [
        'nombre',
        'apellidos',
        'email',
        'telefono',
        'edad',
        'grupo_id'
    ];

    public function grupo()
    {
        return $this->belongsTo(Grupo::class, 'grupo_id');
    }

}
