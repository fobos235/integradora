<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Categorias extends Eloquent
{
    protected $fillable=['nombre', 'descripcion', 'status', 'updated_at', 'created_at'];
}
