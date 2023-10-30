<?php

namespace App\Solid;

// 결제 보고서의 리포트를 포맷을 변경하는 인터페이스를 추가하여 강제한다.
interface SaleReportFormatInterface
{
    public function export($saleData);
}
