<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TipoVisita extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'descricao', 'duracao'];

    public const TIPO_ENUM = [
        "aprovado" => "aprovado",
        "aguardando" => "aguardando",
        "reprovado" => "reprovado"
    ];

    public function visitas(): HasMany
    {
        return $this->hasMany(Visita::class);
    }

    public function fotos(): HasMany
    {
        return $this->hasMany(Foto::class);
    }
}
