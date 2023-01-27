<?php


namespace App\services\cart\orders;

use App\Models\Product;
use App\Models\Factor;
use App\services\cart\orders\Order;

class OrderService {
    

    private $order;
      
    public function __construct(Order $order)     
    {         
        $this->order = $order;
    }

    public  function addProductToOrder(Product $product,Factor $factor)
    {
       if($this->order->hasOrder($product->id, $factor->id)){

          return $this->order->addCountForProduct($product->id, $factor->id);
       }

       return $this->order->addOrder(["product_id" => $product->id, "factor_id" => $factor->id]);
    }
}