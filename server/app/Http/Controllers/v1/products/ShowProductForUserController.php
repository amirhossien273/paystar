<?php

namespace App\Http\Controllers\v1\products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repository\Products\ProductsRepositoryInterface;
use App\Http\Resources\v1\products\ProductResource;

class ShowProductForUserController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(ProductsRepositoryInterface $products)
    {
        return new ProductResource($products->all());
    }
}
