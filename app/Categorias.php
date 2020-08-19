<?php

namespace App;
<<<<<<< HEAD

use Illuminate\Database\Eloquent\Model;

class Categorias extends Model
{
    //
=======
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Categorias extends Eloquent
{
    protected $fillable=['nombre', 'descripcion', 'status', 'updated_at', 'created_at'];
>>>>>>> df098c135ebb7a3b44af2ab18fd99255557d3c24
}
