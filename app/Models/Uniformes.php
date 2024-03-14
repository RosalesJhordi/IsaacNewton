<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Uniformes extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'cantidad',
        'tallas',
        'precio',
        'descuento',
        'tipo',
        'imagen',
    ];
}
