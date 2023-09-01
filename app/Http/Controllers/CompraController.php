<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use Exception;
use Illuminate\Http\Request;

class CompraController extends Controller
{
    public function create(Request $post)
    {
        $validator = validator($post->all(), [
            'fecha' => 'required',
            'total' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        try {
            $nuevaCompra = new Compra();
            $nuevaCompra->fecha = $post->fecha;
            $nuevaCompra->total = $post->total;

            $nuevaCompra->save();

            return "El registro se creo correctamente";
        } catch (Exception $e) {
            return "Bad Request";
        }
    }
}
