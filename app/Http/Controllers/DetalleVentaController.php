<?php

namespace App\Http\Controllers;

use App\Models\Detalle_Venta;
use Exception;
use Illuminate\Http\Request;

class DetalleVentaController extends Controller
{
    public function create(Request $post)
    {
        $validator = validator($post->all(), [
            'venta_id' => 'required|exists:ventas,id',
            'articulo_id' => 'required|exists:articulos,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        try {
            $nuevoDetalle = new Detalle_Venta();
            $nuevoDetalle->articulo_id = $post->articulo_id;
            $nuevoDetalle->venta_id = $post->venta_id;

            $nuevoDetalle->save();

            return "El registro se creo correctamente";
        } catch (Exception $e) {
            return "Bad Request";
        }
    }
}
