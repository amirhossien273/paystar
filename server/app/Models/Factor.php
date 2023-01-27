<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\services\Traits\TraitUuid;

class Factor extends Model
{
    use HasFactory, TraitUuid;
    
    protected $fillable = [
        'user_id',
        'status'
    ];

    public function order()
    {
        return $this->hasMany(Order::class);
    }
}
