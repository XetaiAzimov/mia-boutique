<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // Bu hissə mütləq olmalıdır ki, Controller-dəki 'create' metodu işləsin
    protected $fillable = ['name', 'price', 'type', 'image', 'in_stock'];
}
