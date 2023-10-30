<?php

namespace App\Services;

use App\Solid\PaymentMethodInterface;

/**
 * 결제를 인터페이스로 확장한다.
 */
class PaymentService
{
    public static function pay(PaymentMethodInterface $paymentMethod)
    {
        return $paymentMethod->makePayment();
    }
}
