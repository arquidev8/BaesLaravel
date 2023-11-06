<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OkupadosProperty extends Model
{
    use HasFactory;

    protected $table = 'okupados';

    protected $fillable = [
        'Referencia', 
        'Provincia', 
        'Ciudad', 
        'MetrosCuadrados', 
        'Price',
        'Direccion',
        'Perimetro' 
      
    ];
}
