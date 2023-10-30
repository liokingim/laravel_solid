<?php

namespace App\Solid;

// class PdfExport
// {
//     public function export($data)
//     {
//         return "pdf export";
//     }
// }

/**
 * 인터페이스를 추가하여 메소드를 강제한다.
 */
class PdfExport implements SaleReportFormatInterface
{
    public function export($saleData)
    {
        return "pdf export";
    }
}