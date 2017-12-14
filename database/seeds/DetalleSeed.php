<?php

use Illuminate\Database\Seeder;
use App\Producto;
use App\Ventas;
use App\Detalles;

class DetalleSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i <= 100; $i++) {
            $ramdom = rand ( 1 , 100 );
            $venta = Ventas::find($i);
            $producto = Producto::find(rand ( 1 , 10 ));

            $detalle = new Detalles();
            $detalle->venta = $venta->id;
            $detalle->producto = $producto->id;
            $detalle->cantidad = $ramdom;
            $detalle->save();

        }
    }
}
