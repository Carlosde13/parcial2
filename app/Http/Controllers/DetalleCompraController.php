<?php

namespace App\Http\Controllers;

use App\Models\Detalle_Compra;
use Exception;
use Illuminate\Http\Request;

class DetalleCompraController extends Controller
{
    public function create(Request $post)
    {
        $validator = validator($post->all(), [
            'articulo_id' => 'required|exists:articulos,id',
            'compra_id' => 'required|exists:compras,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        try {
            $nuevoDetalle = new Detalle_Compra();
            $nuevoDetalle->articulo_id = $post->articulo_id;
            $nuevoDetalle->compra_id = $post->compra_id;

            $nuevoDetalle->save();

            return "El registro se creo correctamente";
        } catch (Exception $e) {
            return "Bad Request";
        }
    }
}
