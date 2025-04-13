<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

     // Campos asignables masivamente
     protected $fillable = [
        'nombre',
        'descripcion',
        'fecha',
        'ubicacion',
        'tipo',
    ];

    // Relación con Participaciones
    public function participaciones()
    {
        return $this->hasMany(Participacion::class);
    }
}
