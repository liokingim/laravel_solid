<?php

namespace App\Services;

use App\Solid\EmailServiceInterface;
use Exception;

/**
 * 3: Liskov substitution principle (LSP) in PHP
 *
 * 1. 인터페이스를 추가하여 매개변수 유형은 하위 클래스와 상위 클래스 모두에서 강제로 일치해야 합니다.
 */
class AbcEmailService implements EmailServiceInterface
{
    /**
     * 동일한 매개변수와 리턴값을 가진다.
     * 동일한 내부 조건을 가진다.
     * 동일한 예외 조건을 가진다.
     */
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

        if ($isEmailNotSend) {
            throw new Exception('Failed to send email');
        }
    }
}
