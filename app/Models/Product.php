<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // Bura icazə verdiyimiz sütunları əlavə edirik
    protected $fillable = [
        'name',
        'price',
        'type',
        'image',
        'in_stock',
    ];
}