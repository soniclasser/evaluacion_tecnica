<?php

use Illuminate\Database\Seeder;
use App\Ventas;
use App\Cliente;
use App\Tienda;
use Carbon\Carbon;

class VentaSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i <= 100; $i++) {
            $date = Carbon::now();
            $ramdom = rand ( 1 , 10 );
            $cliente = Cliente::find($ramdom);
            $tienda = Tienda::find($ramdom);

            $venta = new Ventas();
            $venta->fecha = $date->addDays($ramdom);
            $venta->cliente = $cliente->id;
            $venta->tienda = $tienda->id;
            $venta->save();

        }
    }
}
