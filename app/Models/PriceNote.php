<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PriceNote extends Model
{
    use HasFactory;
    protected $fillable = [
        'price_id',
        'notes',

    ];
}
