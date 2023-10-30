<?php

namespace App\Solid;

// class CsvExport
// {
//     public function export($data)
//     {
//         return "csv export";
//     }
// }

/**
 * 인터페이스를 추가하여 메소드를 강제한다.
 */
class CsvExport implements SaleReportFormatInterface
{
    public function export($saleData)
    {
        return "csv export";
    }
}