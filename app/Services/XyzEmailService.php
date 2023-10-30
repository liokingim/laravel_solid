<?php

namespace App\Services;

use App\Solid\EmailServiceInterface;

/**
 * 3: Liskov substitution principle (LSP) in PHP
 *
 * 1. 인터페이스를 추가하여 매개변수 유형은 하위 클래스와 상위 클래스 모두에서 강제로 일치해야 합니다.
 */
class XyzEmailService implements EmailServiceInterface
{
    public function sendEmail(string $to, string $subject, string $message): void
    {
        $condition = false;
        $isSendEmail = false;
        $isEmailNotSend = false;

        if ($condition) {
            //
        }

        // send email

        if ($isSendEmail) {
            //
        }

        // 아래와 같이 예외 조건이 다른면 안된다.
        if ($isEmailNotSend) {
            throw new EmailNotSendException('Failed to send email');
        }
    }
}
