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
}
