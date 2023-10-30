<?php

namespace App\Solid;

/**
 * 5: Dependency inversion principle (DIP)
 *
 * 상위 모듈은 하위 모듈에 의존해서는 안된다. 상위 모듈과 하위 모듈 모두 추상화에 의존해야 한다.
 * 추상화는 세부 사항에 의존해서는 안된다. 세부사항이 추상화에 의존해야 한다.
 */
class StripePaymentMethod implements PaymentMethodInterface
{

    public function makePayment()
    {
        return 'stripe payment';
    }
}
