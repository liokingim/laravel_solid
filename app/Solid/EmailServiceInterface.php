<?php

namespace App\Solid;

/**
 * 3: Liskov substitution principle (LSP) in PHP
 *
 * 1. 매개변수 유형은 하위 클래스와 상위 클래스 모두에서 일치해야 합니다.
 */
interface EmailServiceInterface
{
    public function sendEmail(string $to, string $subject, string $message):void;
}
