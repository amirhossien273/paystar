<?php


namespace App\services\payment\SignStrategy;

use App\Models\Factor;
use App\const\Consts;

class GenerateSignBackPayment {


    public  function handle(array $data)
    {
        return hash_hmac('SHA512',$data["amount"]."#".$data["ref_num"]."#".$data["card_number"]."#".$data["tracking_code"], Consts::KEY_PAYMENT_PAYSTAR);
    }

}