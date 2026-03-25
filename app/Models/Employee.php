<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    // Bura icazə verdiyimiz sütunları əlavə edirik
    protected $fillable = [
        'name',
        'position',
    ];
}