<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dia extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = [
        'dia'
    ];
    protected $fillable = [
        'dia'
    ];

    public function horarios(): HasMany
    {
        return $this->hasMany(Horario::class);
    }
}
