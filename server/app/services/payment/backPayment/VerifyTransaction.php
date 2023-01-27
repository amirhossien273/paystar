<?php

namespace App\services\payment\backPayment;

use GuzzleHttp\Client;

class VerifyTransaction
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
            return true;
        }catch (\Exception $exception){

            throw new \Exception('عدم ارتباط با سرور درگاه پرداخت.');
        }
    }
}