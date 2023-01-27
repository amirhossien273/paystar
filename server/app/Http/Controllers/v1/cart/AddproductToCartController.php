<?php

namespace App\Http\Controllers\v1\cart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\services\cart\CartFacades;
use App\Repository\Products\ProductsRepository;
use App\Models\Product;

class AddproductToCartController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Product $request,CartFacades $cart)
    {
        try {
            $cart->addProductsToCart($request,auth()->user());
            return response()->json(["status" => "sucess"], 200);
        } catch (\Throwable $th) {
        }
        
    }
}
