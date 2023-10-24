<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use App\Models\User;



class BussinesUnit extends Model
{
    use HasFactory;
    use HasUuids;

    protected $table='bussines_units';

    protected $fillable = [
        'name',
        'street',
        'number',
        'state',
        'city',
        'neighborhood',
        'zipcode',
        'user_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id');
    }
}
