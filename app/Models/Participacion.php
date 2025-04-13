<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participacion extends Model
{
    use HasFactory;
    // 👇 Esta línea corrige el error de nombre de tabla
    protected $table = 'participaciones';
     // Campos que se pueden asignar masivamente

     protected $fillable = [
        'evento_id',
        'equipo_id',
        'resultado',
        'premios',
    ];

    // Relación con Evento
    public function evento()
    {
        return $this->belongsTo(Evento::class);
    }

    // Relación con Equipo
    public function equipo()
    {
        return $this->belongsTo(Equipo::class);
    }
}
