<?php

namespace App\Http\Controllers\v1\payment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\v1\BackPaystarRequest;
use App\services\payment\backPayment\PaymentBackService;

class BackPaystarController extends Controller
{
   
    public function __invoke(BackPaystarRequest $request, PaymentBackService $paymentBackService)
    {
        try {
            return response()->json(["status" => "success", "data" => $paymentBackService->handle($request)]);
        } catch (\Exception $exception) {
            return response()->json(["status" => "error", "message" => $exception->getMessage()],500);
        }
    }
}
