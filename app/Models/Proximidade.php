<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proximidade extends Model
{
    use HasFactory;

    /** Muitos pra muitos */
    public function imoveis()
    {
        return $this->belongsToMany(Imovel::class)->withTimestamps();
    }
    /** Convenção de nomenclatura
     * Tabela intermediária:
     * Pega o nome dos dois modelos em snake_case singular
     * em ordem alfabética: o eloquent espera encontrar
     * imovel_proximidade,
     * espera também encontrar as chaves estrangeiras
     * proximidade_id
     * imovel_id
     */
}
