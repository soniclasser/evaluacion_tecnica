<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ventas;
use App\Detalles;
use App\Producto;

class VentaController extends Controller
{
    public function paginate(Request $request, Ventas $ventas)
    {
        if($id = $request->input('cliente'))
        {
            $ventas = $ventas->where('cliente', '=', $id);
        } else if($id = $request->input('tienda')) {
            $ventas = $ventas->where('tienda', '=', $id);
        } else if($id = $request->input('producto')) {
            $detalles = Detalles::where('producto', '=', $id)->get();
            $ventas = $ventas->whereIn('id',$detalles->pluck('venta'));
        }

        $ventas = $ventas->paginate(15);

        return view('welcome', compact('ventas'));
    }
}
