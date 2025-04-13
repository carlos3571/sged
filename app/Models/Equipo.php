<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    use HasFactory;
    
    // Campos asignables masivamente
    protected $fillable = [
        'nombre',
        'deporte',
        'entrenador',
    ];

    // Relación con Participaciones
    public function participaciones()
    {
        return $this->hasMany(Participacion::class);
    }
}
