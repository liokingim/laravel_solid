<?php

namespace App\Solid;

class StripePaymentMethod implements PaymentMethodInterface
{

    public function makePayment()
    {
        return 'stripe payment';
    }
}
