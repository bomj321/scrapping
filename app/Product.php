<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Product extends Model
{

    protected $table = "products";
    //CAMPOS DE LA TABLA
    protected $fillable = [
        'seccion',
        'modelo',
        'imagen',
        'descuento',
        'link',
        'talla',
        'talla_filtrada',
        'precio_anterior',
        'precio_oferta',
        'genero',
    ];



}
