<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;


class Product extends Model
{
    use HasFactory;
    use HasUuids;

    protected $table = 'products';

     
    protected $fillable = [
        'name',
        'quantity',
        'brand',
        'bussines_unit_id'
    ];

}
