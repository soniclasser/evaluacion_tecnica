<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ventas extends Model
{
    public function clientes()
    {
        return $this->belongsTo('App\Cliente', 'cliente');
    }

    public function tiendas()
    {
        return $this->belongsTo('App\Tienda', 'tienda');
    }

    public function detalles()
    {
        return $this->hasOne('App\Detalles', 'venta');
    }
}
