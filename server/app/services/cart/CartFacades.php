<?php


namespace App\services\cart;

use App\services\cart\orders\OrderService;
use App\services\cart\factors\FactorService;
use App\Models\Product;
use App\Models\User;


class CartFacades {

    private $factor;
    private $order;

    public function __construct(FactorService $factor, OrderService $order)
    {
        $this->factor = $factor;
        $this->order  = $order;
    }
    
    public  function addProductsToCart(Product $product,User $user)
    {
      return $this->order->addProductToOrder($product, $this->factor->addUserToFactor($user));
    }
}