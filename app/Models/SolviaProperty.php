<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolviaProperty extends Model
{
    use HasFactory;

    protected $table = 'solvia_properties';

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
        'MainPhoto',
        'ImageSources',
        'Ciudad'
    ];
}