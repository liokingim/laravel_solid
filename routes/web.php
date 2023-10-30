<?php

use App\Services\PaymentService;
use App\Solid\AreaCalculator;
use App\Solid\Circle;
use App\Solid\CodPaymentMethod;
use App\Solid\CsvExport;
use App\Solid\PaypalPaymentMethod;
use App\Solid\PdfExport;
use App\Solid\Rectangle;
use App\Solid\SaleReports;
use App\Solid\StripePaymentMethod;
use App\Solid\Triangle;
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

// 1: Single Responsibility Principle (SRP)
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

    // return view('welcome');
});

// 2: Open-Closed Principle (OCP)
Route::get('/area', function () {

    // return (new AreaCalculator())->totalArea([
    //     new Rectangle(10, 20),
    //     new Rectangle(20, 20),
    //     new Circle(10),
    //     new Triangle(10, 20),
    // ]);

    // ShapeInterface 인터페이스를 매개변수에 추가하여 수정
    // $shapes = [
    //     new Rectangle(10, 20),
    //     new Rectangle(20, 20),
    //     new Circle(10),
    //     new Triangle(10, 20),
    // ];

    // return (new AreaCalculator())->totalArea(...$shapes);

    // 여러개의 매개변수를 한꺼번에 받아도 된다.
    return (new AreaCalculator())->totalArea(
        new Rectangle(10, 20),
        new Rectangle(20, 20),
        new Circle(10),
        new Triangle(10, 20),
    );
});

// 결제방법을 인터페이스로 확장하여 서비스에서 강제한다.
Route::get('/payment', function () {
    // 각 결제 방법 클래스를 추가하여 선언하는 것으로 완료된다.
    // return (new PaymentService())->pay(new StripePaymentMethod());
    // return (new PaymentService())->pay(new PaypalPaymentMethod());
    return (new PaymentService())->pay(new CodPaymentMethod());
});

// 판매 리포트를 2: Open-Closed Principle (OCP)로 수정한다.
Route::get('/sale_report2', function () {

    // 인터페이스를 사용하여 간단히 변경이 가능하다.
    return (new SaleReports())->between('1 jan 2023', '31 jan 2023')
    ->export(
        // new PdfExport()
        new CsvExport()
    );
});