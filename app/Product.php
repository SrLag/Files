<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'id',
        'descripcion',
        'precio',
        'created_at',
        'updated_at'
    ];
}
