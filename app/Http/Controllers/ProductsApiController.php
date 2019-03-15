<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductsApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
          $busqueda = request()->busqueda;

          if (empty($busqueda)) {


             $products = Product::orderBy('descuento', 'DESC')->paginate(4);
               return [
                   'products' => $products,                   
                   'busqueda' => 'No hay Nada'
               ];

               
          
          }else{

              $busqueda_filtrada = array_unique($busqueda);
              $array_to_string   = implode(",", $busqueda_filtrada);
              $string = preg_replace('/[\x00-\x08\x0B\x0C\x0E-\x1F\x7F-\x9F]/u', '', $array_to_string);



              $products = Product::orderBy('descuento', 'DESC')
              ->Where('genero', 'Hombre')
              ->paginate(4);



              
               return [
                   'products' => $products,
                   'busqueda' => $string

               ];


          }
          
    }

}
