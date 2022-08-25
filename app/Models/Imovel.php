<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imovel extends Model
{
    use HasFactory;
    /** Quando o nome não segue a convenção em ingles
     * precisa adicionar a diretiva abaixo */
    protected $table = "imoveis";
    /** Um pra um */
    public function endereco()
    {
        /** hasOne -> Imovél -> Têm um */
        // return $this->hasOne('App\Models\Endereço');
        return $this->hasOne(Endereco::class);
        /** Desta forma o eloquent espera encontrar
         * na tabela Endereco a chave estrangeira seguindo
         * seguindo a convenção: Nome do modelo em snake_case
         * e acrescenta o sufixo underscore id ficando
         * da seguinte forma: imovel_id
         */
    }
    public function cidade()
    {
        /** Imóvel pertênce á Cidade */
        return $this->belongsTo(Cidade::class);
    }
    public function finalidade()
    {
        /** Imóvel pertênce á Finalidade */
        return $this->belongsTo(Finalidade::class);
    }
    public function tipo()
    {
        /** Imóvel pertênce á Tipo */
        return $this->belongsTo(Tipo::class);
    }
    /** Muitos pra muitos */
    public function proximidades()
    {
        return $this->belongsToMany(Proximidade::class)->withTimestamps();
    }
    /** Convenção de nomenclatura
     * Tabela intermediária:
     * Pega o nome dos dois modelos em snake_case singluar
     * em ordem alfabética: o eloquent espera encontrar
     * imovel_proximidade,
     * espera também encontrar as chaves estrangeiras
     * imovel_id
     * proximidade_id
     */
}
