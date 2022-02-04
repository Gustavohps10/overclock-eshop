<?php

namespace Source\Controllers;

use Source\Services\PaymentPlatform\PicPay;
use Source\Models\Pedido;

class Callback extends Controller{
    public function __construct($router){
        parent::__construct($router);
    }

    public function picpay()
    {
        $picpay = new PicPay();
        $headers = getallheaders();

        if(empty($headers["x-seller-token"]) || !$picpay->verifySellerToken($headers["x-seller-token"])){
            return;
        };

        $data = json_decode(file_get_contents("php://input"));
        $referenceId = $data->referenceId;
        //$authorizationId = $data["authorizationId"];
        
        $statusResponse = $picpay->getPaymentStatus($referenceId);
        $status = $statusResponse->status;
        
        $pedido = (new Pedido)->find("referencia = :ref", "ref={$referenceId}")->fetch();
        $pedido->statusPedido = TRANSLATION_STATUS_PAY[$status];

        $pedido->save();
    }
}