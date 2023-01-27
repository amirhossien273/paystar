<?php
namespace App\services\payment;

use App\Models\Factor;
use App\services\payment\SignStrategy\GenerateSignUs;
use App\const\Consts;

class GeneratePaymentRequirements {

    private $generateSignUs;
    private $checkTransaction;

    public function __construct(GenerateSignUs $generateSignUs,CheckTransaction $checkTransaction)
    {
      $this->generateSignUs = $generateSignUs;
      $this->checkTransaction = $checkTransaction;
    }
    
    public  function handle(Factor $factor)
    {
        $data = array();
        $header = array();
        $price = (int) $this->generateAmount($factor);
        $data['amount'] = $price;
        $data['order_id'] = $factor->id;
        $data['callback'] =  Consts::REDIRECT_URL;
        $data['sign'] = $this->generateSignUs->handle($data);
        $header = ["headers" => ["Authorization" => "bearer " . Consts::GATEWAY_ID]];
       
        return Response::handle($this->checkTransaction->handle(Consts::URL_FOR_CONNECT_TO_PAYSTAR, $data, $header));
    }

    private function generateAmount(Factor $factor){

        $count = 0;
        $data = $factor->with(["order" => function($query){$query->with("product");}])->first();
        foreach($data->order as $order){
            $count += $order->count * $order->product->price;
        }

        return $count;
    }
}