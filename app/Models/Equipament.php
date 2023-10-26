<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;



class Equipament extends Model
{
    use HasFactory;

    use HasFactory;
    use HasUuids;

    protected $table = 'equipaments';

    protected $fillable = [
        'name',
        'model',
        'photo',
        'year_of_manufacture',
        'serial_number',
        'bussines_unit_id'
    ];

    public function bussinesUnit(): BelongsTo
    {
        return $this->belongsTo(BussinesUnit::class, 'id');
    }
}
