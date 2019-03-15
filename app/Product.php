<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Product extends Model
{

    protected $table = "products";
    //CAMPOS DE LA TABLA
    protected $fillable = [
        'seccion',
        'marca',
        'modelo',
        'imagen',
        'descuento',
        'link',
        'talla',
        'talla_filtrada',
        'precio_anterior',
        'precio_oferta',
        'precio_filtrada',
        'genero',
    ];

    /**
     * The columns of the full text index
     */
    protected $searchable = [
        'seccion',
        'marca',
        'talla_filtrada',
        'precio_filtrada',
        'genero',
    ];



}
