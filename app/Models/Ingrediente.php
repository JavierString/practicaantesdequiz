<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ingrediente extends Model
{
    protected $fillable = [
        'nombre',
        'cantidad',
        'unidad_medida'
    ];

    public function receta(): BelongsTo
    {
        return $this->belongsTo(Receta::class);
    }
}
