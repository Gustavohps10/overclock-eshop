<?php

namespace Source\Services\PaymentPlatform;

use Source\Services\PaymentStrategy;

class PicPay implements PaymentStrategy  {
    private $x_picpay_token = "b80e0e07-b4a2-47e1-8574-16f0e53c1fd6";
    private $x_seller_token = "ec638411-b956-4ea1-9a9f-9ab9002353aa";

    public function generatePaymentIntent($referenceId, $value)
    {
        $header = array(
            'x-picpay-token: '.$this->x_picpay_token
        );

        $data = (object)[ 
            "referenceId" => $referenceId, 
            "callbackUrl" => site()."/callback/picpay", 
            //"expiresAt" => "2020-12-12T15:53:00+05:00", 
            "returnUrl" => "http://www.picpay.com/#transacaoConcluida", 
            "value"=> $value, 
            "additionalInfo" => [ null ], 
            "buyer"=> (object)[ 
                "firstName" => "João", 
                "lastName" => "dos Testes", 
                "document" => "010.091.001-91" 
            ] 
        ];

        $url  = 'https://appws.picpay.com/ecommerce/public/payments'; //POST
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        
        $result = curl_exec($ch);
        curl_close($ch);
        
        return json_decode($result);
    }

    public function getPaymentStatus($referenceId)
    {
        $header = array(
            'x-picpay-token: '.$this->x_picpay_token
        );
        
        $url  = "https://appws.picpay.com/ecommerce/public/payments/$referenceId/status";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        
        $result = curl_exec($ch);
        curl_close($ch);
        return json_decode($result);
    }

    public function verifySellerToken($token){
        return $token == $this->x_seller_token ? true : false;
    }
}