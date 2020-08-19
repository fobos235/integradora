<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Venta extends Eloquent
{
    protected $table = 'ventas';
    protected $fillable=['fecha', 'iva','subtotal','descuento', 'total', 'producto'];
}
