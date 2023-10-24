<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Equipament extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'year',
        'number_unit',
        'event_id',
        'bussines_unit_id',
    ];

    public function bussinesUnit(): BelongsTo
    {
        return $this->belongsTo(BussinesUnit::class, 'id');
    }
}
