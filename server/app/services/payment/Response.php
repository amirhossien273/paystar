<?php
namespace App\services\payment;
use App\const\Consts;

class Response
{


    /**
     * @param $response
     * @return array
     */
    public static function handle($response){
        $data = [];
        $respons = $response->getData();
        if($respons->status != 1){
            throw new \Exception('عدم ارتباط با سرور درگاه پرداخت.');
        }
        $data["token"] =  $respons->data->token;
        $data["payment_amount"] =  $respons->data->payment_amount;
        $data["url"] =  Consts::PAYMENT_URL;
        return $data;
    }

}
