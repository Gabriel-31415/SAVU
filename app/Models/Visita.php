<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Visita extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['status', 'descricao', 'tipo_visita_id'];

    public function tipoVisita(): BelongsTo
    {
        return $this->belongsTo(TipoVisita::class);
    }
}
