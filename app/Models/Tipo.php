<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
    use HasFactory;
    /** Tipo -> Têm muitos Imóveis */
    public function imoveis()
    {
        return $this->hasMany(Imovel::class);
    }
}
