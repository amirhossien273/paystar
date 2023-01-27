<?php


namespace App\services\payment\SignStrategy;

use App\Models\Factor;
use App\const\Consts;

class GenerateSignUs {


    public  function handle(array $data)
    {
        return hash_hmac('SHA512',$data["amount"]."#".$data["order_id"]."#".$data["callback"], Consts::KEY_PAYMENT_PAYSTAR);
    }

}