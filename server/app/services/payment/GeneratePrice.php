<?php
namespace App\services\payment;

use App\Models\Factor;

class GeneratePrice {


  
    public  function handle(Factor $factor)
    {
        $count = 0;
        $data = $factor->with(["order" => function($query){$query->with("product");}])->first();
        foreach($data->order as $order){
            $count += $order->count * $order->product->price;
        }

        return $count;
    }

}