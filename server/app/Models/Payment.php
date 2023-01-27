<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\services\Traits\TraitUuid;

class Payment extends Model
{
    use HasFactory, TraitUuid;

    protected $fillable = [
        'factor_id',
        'ref_num',
        'transaction_id',
        'card_number',
        'tracking_code',
        "amount"
    ];
}
