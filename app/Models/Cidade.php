<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    use HasFactory;

    protected $fillable = ['nome'];

    /** Um pra muitos */
    public function imoveis()
    {
        /** Cidade -> Têm muitos Imóveis */
        return $this->hasMany(Imovel::class);
        /** Convenção: o eloquent espera encontrar
     * o campo 'cidade_id' na tabela Imoveis
     */
    }


}
