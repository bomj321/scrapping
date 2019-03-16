<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    use FullTextSearch;

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
        'filtros',
    ];

    /**
     * The columns of the full text index
     */
    protected $searchable = [       
        'filtros',
    ];



}
