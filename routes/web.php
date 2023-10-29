<?php

use App\Solid\CsvExport;
use App\Solid\PdfExport;
use App\Solid\SaleReports;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Single Responsibility Principle (SRP)
Route::get('/sale_report', function () {

    $saleReport = new SaleReports();
    // $pdfExport = new PdfExport();
    $csvExport = new CsvExport();

    // return $pdfExport->export(
    //     $saleReport->between('1 jan 2023', '31 jan 2023')
    // );

    return $csvExport->export(
        $saleReport->between('1 jan 2023', '31 jan 2023')
    );

    return view('welcome');
});
