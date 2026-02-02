<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Factura extends Model
{
    /** @use HasFactory<\Database\Factories\FacturaFactory> */
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'numero_factura',
        'fecha',
        'cliente',
        'total',
        'estado'
    ];
}
