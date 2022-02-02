<?php

namespace Source\Services;

class Payment{
    private $service;

    public function __construct(PaymentStrategy $service)
    {
        $this->service = $service;
    }

    public function generatePaymentIntent($referenceId, $value){
        return $this->service->generatePaymentIntent($referenceId, $value);
    }
}