<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\TipoMarcajeController;
use  App\Http\Controllers\UsuarioController;
use  App\Http\Controllers\MarcajeController;
use  App\Http\Controllers\Controller;
use PHPJasper\PHPJasper;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/hola', function () {
    return ('hola');
});
// Route::apiResources([
//     'usuarios' => UsuarioController::class,
//     'tipos' => TipoMarcajeController::class,
// ]);


// Route::post('register', 'UserController@register');
// Route::post('login', 'UserController@authenticate');
Route::group([],
    function($router){
        Route::post('/register', [Controller::class,'register']);
        Route::post('/login', [Controller::class,'authenticate']);
    }
);
Route::group(['middleware' => ['jwt.verify']], function() {
//Route::group([], function() {
        // Route::get('/', [::class,'']);
        Route::get('/estado', [TipoMarcajeController::class,'obtenerEstado']);
        Route::get('/usuarios', [Controller::class,'obtenerUsuarios']);
        Route::post('/usuario', [Controller::class,'store']);
        Route::put('/usuario/{id}', [Controller::class,'update']);
        Route::put('/usuario/delete/{id}', [Controller::class,'destroy']);
        Route::get('/marcajeD', [MarcajeController::class,'obtenerDetalle']);
        Route::post('/marcajeD', [MarcajeController::class,'store']);
        Route::get('/usuario/{id}', [Controller::class,'show']);
        Route::get('/usuario/email/{email}', [Controller::class,'showByEmail']);
        Route::get('/marcajeD/{id}', [MarcajeController::class,'show']);
        Route::get('/marcajeD/user/{id}/{fecha}', [MarcajeController::class,'showByuser']);

    }
);

