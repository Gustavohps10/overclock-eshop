<?php

namespace Source\Services;

interface PaymentStrategy {
    function generatePaymentIntent($referenceId, $value);
}
