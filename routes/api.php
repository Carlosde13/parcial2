<?php

use App\Http\Controllers\CompraController;
use App\Http\Controllers\DetalleCompraController;
use App\Http\Controllers\DetalleVentaController;
use App\Http\Controllers\VentaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/ventas/crear',[VentaController::class, 'create']);
Route::post('/detalleVenta/crear',[DetalleVentaController::class, 'create']);
Route::post('/compras/crear',[CompraController::class, 'create']);
Route::post('/detalleCompra/crear',[DetalleCompraController::class, 'create']);