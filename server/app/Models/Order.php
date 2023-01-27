<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\services\Traits\TraitUuid;

class Order extends Model
{
    use HasFactory, TraitUuid;

    protected $fillable = [
        'product_id',
        'factor_id',
        'count'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
