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

          if (empty($busqueda) AND $busqueda == null) {


             $products = Product::orderBy('descuento', 'DESC')->paginate(32);
               return [
                   'products' => $products,                   
                   'busqueda' => 'No hay Nada'
               ];

               
          
          }else{

              $busqueda_filtrada       = array_unique($busqueda);
              $array_to_string         = implode(",", $busqueda_filtrada);
              $stringWithOutCommas     = str_replace(',',' ',$array_to_string);
            

              $products = Product::search($stringWithOutCommas)  
              ->orderBy('descuento', 'DESC')            
              ->paginate(32);



              
               return [
                   'products' => $products,
                   'busqueda' => $stringWithOutCommas

               ];


          }
          
    }

}
