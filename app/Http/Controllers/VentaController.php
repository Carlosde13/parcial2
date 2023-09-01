<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use Exception;
use Illuminate\Http\Request;

class VentaController extends Controller
{
    public function create(Request $post)
    {
        $validator = validator($post->all(), [
            'cliente_id' => 'required|exists:clientes,id',
            'vendedor_id' => 'required|exists:vendedores,id',
            'fecha' => 'required',
            'total' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        try {
            $nuevaVenta = new Venta();
            $nuevaVenta->fecha = $post->fecha;
            $nuevaVenta->cliente_id = $post->cliente_id;
            $nuevaVenta->vendedor_id = $post->vendedor_id;
            $nuevaVenta->total = $post->total;

            $nuevaVenta->save();

            return "El registro se creo correctamente";
        } catch (Exception $e) {
            return "Bad Request";
        }
    }
}
