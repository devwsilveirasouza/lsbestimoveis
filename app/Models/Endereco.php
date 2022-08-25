<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Endereco extends Model
{
    use HasFactory;

    public function imovel()
    {   /** Pertence á. */
        return $this->belongsTo(Imovel::class);
    }
    /** Convenção pra identificar a chave estrangeira
     * Pega o nome do método e acrescenta o sufixo id
     * Ficando: imovel_id
     */
}
