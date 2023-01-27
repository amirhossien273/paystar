<?php
namespace App\services\payment;


use GuzzleHttp\Client;

class CheckTransaction
{

    /**
     * @var Client
     */
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @param $url
     * @param array $data
     * @return string
     * @throws \Exception
     */
    public function handle($url, array $data, array $header){
  
        try {
            // $request = $this->client->post($url, $header, $data);
            // return $request->getBody()->getContents();
            return response()->json(["status" => 1, "message" => "ok", "data" => ["token" => "sfds34324", "ref_num"=> "werew234", "order_id"=> "5c00302e-eb07-4cb8-938f-0c57c349d876", "payment_amount"=> "1000"]]);
        }catch (\Exception $exception){

            throw new \Exception('عدم ارتباط با سرور درگاه پرداخت.');
        }
    }

}
