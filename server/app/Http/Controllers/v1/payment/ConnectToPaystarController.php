<?php

namespace App\Http\Controllers\v1\payment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Factor;
use App\services\payment\GeneratePaymentRequirements;

class ConnectToPaystarController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Factor $request,GeneratePaymentRequirements $connect)
    {
        try {
            return response()->json(["status" => "success", "data" => $connect->handle($request)]);
        } catch (\Exception $exception) {
            return response()->json(["status" => "error", "message" => $exception->getMessage()],500);
        }
    }
}
