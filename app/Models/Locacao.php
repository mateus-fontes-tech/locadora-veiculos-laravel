<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Locacao extends Model
{
    protected $fillable = [
        'cliente_id',
        'veiculo_id',
        'data_retirada',
        'data_devolucao',
        'dias',
        'valor_total',
        'status'
    ];


    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }


    public function veiculo()
    {
        return $this->belongsTo(Veiculo::class);
    }
}