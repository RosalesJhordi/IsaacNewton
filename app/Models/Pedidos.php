<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedidos extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_producto',
        'cantidad',
        'talla',
        'id_cliente',
        'total',
        'confirmado',
        'estado'
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class,'id_cliente');
    }
    public function producto()
    {
        return $this->belongsTo(Uniformes::class,'id_producto');
    }
}
