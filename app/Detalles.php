<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detalles extends Model
{
    public function productos()
    {
        return $this->belongsTo('App\Producto', 'producto');
    }

}
