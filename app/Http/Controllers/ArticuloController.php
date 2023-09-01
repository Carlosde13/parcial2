<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use Exception;
use Illuminate\Http\Request;

class ArticuloController extends Controller
{
    public function create(Request $post)
    {
        $validator = validator($post->all(), [
            'nombre' => 'required',
            'precio' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        try {
            $nuevoArticulo = new Articulo();
            $nuevoArticulo->nombre = $post->nombre;
            $nuevoArticulo->precio = $post->precio;

            $nuevoArticulo->save();

            return "El registro se creo correctamente";
        } catch (Exception $e) {
            return "Bad Request";
        }
    }
}
