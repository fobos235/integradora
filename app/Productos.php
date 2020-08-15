<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Productos extends Eloquent
{
     protected $fillable=['nombre', 'marca','precio','categoria', 'modelo', 'stock', 'updated_at', 'created_at'];
}
