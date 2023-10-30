<?php

namespace App\Solid;

use Illuminate\Support\Facades\DB;

/**
 * Single Responsibility Principle (SRP) states
 */
class SaleReports
{
    /**
     * 인터페이스 추가로 체이닝 가능한 변수로 변경한다.
     */
    public $sales;

    // public function between($startDate, $endDate)
    // {
    //     return DB::table('sales')
    //     ->whereBetween('created_at', [$startDate, $endDate])
    //     ->latest()
    //     ->get();
    // }

    /**
     * 인터페이스 추가로 체이닝으로 변경한다.
     */
    public function between($startDate, $endDate)
    {
        $this->sales = DB::table('sales')
            ->whereBetween('created_at', [$startDate, $endDate])
                ->latest()
                ->get();

        return $this;
    }

    public function forMonth($month)
    {
        //
    }

    public function forYear($year)
    {
        //
    }

    /**
     * 인터페이스를 추가하여 포맷을 하나로 통일한다.
     */
    public function export(SaleReportFormatInterface $format)
    {
        return $format->export($this->sales);
    }
}