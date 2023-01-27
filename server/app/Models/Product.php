<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\services\Traits\TraitUuid;

class Product extends Model
{
    use HasFactory, TraitUuid;

    protected $fillable = [
        'img',
        'title',
        'discription',
        'price',
    ];
}
