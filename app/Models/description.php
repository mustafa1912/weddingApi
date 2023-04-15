<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class description extends Model
{
    use HasFactory;
    protected $fillable=[
        'price_id',
        'notes'
    ];
    public function prices(){
        return $this->belongsTo(Price::class,'price_id');
    }
}
