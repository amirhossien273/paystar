<?php

namespace App\Http\Controllers\v1\cart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Repository\factors\FactorRepositoryInterface;

class ShowCartController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(FactorRepositoryInterface $factor)
    {
        return response()->json(["data" => $factor->getFactorWithOrder()]);
    }
}
