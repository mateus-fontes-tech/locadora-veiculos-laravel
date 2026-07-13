<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Veiculo extends Model
{
    protected $fillable = [
        'marca',
        'modelo',
        'ano',
        'placa',
        'valor_diaria',
        'status'
    ];


    public function locacoes()
    {
        return $this->hasMany(Locacao::class);
    }
}