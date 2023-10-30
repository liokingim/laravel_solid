<?php

namespace App\Solid;

class PaypalPaymentMethod implements PaymentMethodInterface
{

    public function makePayment()
    {
        return 'paypal payment';
    }
}
