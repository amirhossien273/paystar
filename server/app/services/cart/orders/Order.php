<?php


namespace App\services\cart\orders;


use App\Repository\orders\OrderRepository;

class Order {
    
    protected $order;     

     
    public function __construct(OrderRepository $order)     
    {         
        $this->order = $order;
    }


    public function hasOrder($product_id, $factor_id)
    {

        if($this->order->getOrder($product_id, $factor_id)){
            return true;
        }
        
        return false;
    }

    public function addOrder($order)
    {
       return $this->order->create($order);
    }

    public function addCountForProduct($product_id, $factor_id)
    {
        $order = $this->order->getOrder($product_id, $factor_id);
        $count = 1 + $order->count;
        $order->count = $count;
        $this->order->update(["count" => $count], $order->id);
        return $order;

    }

}