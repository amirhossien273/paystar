<?php

namespace App\services\payment\backPayment;

use App\Repository\factors\FactorRepository;
use App\Repository\Payment\PaymentRepository;
use Illuminate\Http\Request;
use App\services\payment\GeneratePrice;
use App\services\payment\SignStrategy\GenerateSignBackPayment;
use App\services\payment\backPayment\VerifyTransaction;
use App\const\Consts;

class PaymentBackService
{
    private $factor;
    private $generatePrice;
    private $generateSignBackPayment;
    private $verifyTransaction;
    private $paymentRepository;
   
    public function __construct(FactorRepository $factor, GeneratePrice $generatePrice, GenerateSignBackPayment $generateSignBackPayment, VerifyTransaction $verifyTransaction, PaymentRepository $paymentRepository)
    {
        $this->factor = $factor;
        $this->generatePrice = $generatePrice;
        $this->generateSignBackPayment = $generateSignBackPayment;
        $this->verifyTransaction = $verifyTransaction;
        $this->paymentRepository = $paymentRepository;
    }


    public function handle(Request $request){
        
        try {
            $data = [];
            $dataSing = [];
            $dataSing["amount"] = $data["amount"] = $this->generatePrice->handle($this->factor->find($request->order_id));
            $dataSing["ref_num"] = $data["ref_num"] = $request->ref_num;
            $dataSing["card_number"]  = $request->card_number;
            $dataSing["tracking_code"] = $request->tracking_code;
            $data['sign'] = $this->generateSignBackPayment->handle($dataSing);
            $header = ["headers" => ["Authorization" => "bearer " . Consts::GATEWAY_ID]];

            if($this->verifyTransaction->handle(Consts::PAYMENT_VERIFY_URL,$data,$header)){

                $this->factor->update(["status" => 1], $request->order_id);
                return $this->paymentRepository->create([
                    "factor_id"      => $request->order_id,
                    "ref_num"        => $request->ref_num,
                    "card_number"    => $request->card_number,
                    "tracking_code"  => $request->tracking_code,
                    "transaction_id" => $request->transaction_id,
                    // "amount"         => $request->amount,
                ]);
            }
             return  ;
        } catch (\Exception $th) {
            throw new \Exception('عدم ارتباط با سرور درگاه پرداخت.');
        }
       
    }

}
