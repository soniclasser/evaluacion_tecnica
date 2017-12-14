<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ventas;
use App\Detalles;
use App\Producto;
use App\Tienda;
use App\Cliente;

class VentaController extends Controller
{
    public function paginate(Request $request, Ventas $ventas)
    {
        if($request->input('filtro') == 'cliente')
        {
            $id = $request->input('id', 1);
            $ventas = $ventas->where('cliente', '=', $id);
        } else if($request->input('filtro') == 'tienda') {
            $id = $request->input('id', 1);
            $ventas = $ventas->where('tienda', '=', $id);
        } else if($request->input('filtro') == 'producto') {
            $id = $request->input('id', 1);
            $detalles = Detalles::where('producto', '=', $id)->get();
            $ventas = $ventas->whereIn('id',$detalles->pluck('venta'));
        }

        $ventas = $ventas->paginate(15);

        $tiendas = Tienda::all();
        $productos = Producto::all();
        $clientes = Cliente::all();

        return view('welcome', compact('ventas', 'ventas_', 'tiendas', 'productos', 'clientes'));
    }
}
