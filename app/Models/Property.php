<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $table = 'aliseda_properties';

    protected $fillable = [
        'Referencia', 
        'Title', 
        'Descripcion', 
        'Provincia', 
        'Direccion', 
        'MetrosCuadrados', 
        'Habitaciones', 
        'Banos', 
        'Price',
        'MainPhoto'
    ];
}
