<?php

use Illuminate\Support\Facades\Route;
use PHPJasper\PHPJasper ;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/compilarReporte', function () {
    $input = base_path() .'/reportes/marcajereport.jrxml';

    $jasper = new PHPJasper;
    $jasper->compile($input)->output();

    return response()->json([
        'status' => 'ok',
        'msj' => 'Reporte compilado!'
    ]);
});
Route::get('/reporte', function () {
    $input = base_path() .
    '/reportes/marcajereport.jasper';
    $output = base_path() .
    '/reportes';
    $options = [
        'format' => ['pdf']
    ];

    $jasper = new PHPJasper;

    $jasper->process(
        $input,false,
        array("pdf", "rtf"),
        array("php_version" => "8.1.6")
    )->output();
    //exec($jasper->output().' 2>&1', $output);
    //print_r($output);
    // $jasper->process(
    //     $input,
    //     $output,
    //     $options
    //     )->output();

    $pathToFile = base_path() .
    '/reportes/marcajereport.pdf';
    return response()->file($pathToFile);
    //return response($pathToFile, 200, ['Content-Type' => 'text/xml']);

});
