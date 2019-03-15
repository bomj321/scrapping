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


             $products = Product::orderBy('descuento', 'DESC')->paginate(4);
               return [
                   'products' => $products,                   
                   'busqueda' => 'No hay Nada'
               ];

               
          
          }else{

              $busqueda_filtrada = array_unique($busqueda);
              $array_to_string   = implode(",", $busqueda_filtrada);

              $products = Product::where(function ($q) use ($busqueda_filtrada) {
                      foreach ($busqueda_filtrada as $value) {
                        $q->Where('seccion', 'like', "%{$value}%")
                          ->Where('genero', 'like', "%{$value}%")
                          ->Where('precio_filtrada', 'like', "%{$value}%");
                      }
                })
              ->orderBy('descuento', 'DESC')
              ->paginate(4);

            /*  $products = Product::orderBy('descuento', 'DESC')
              ->Where('seccion', 'LIKE', $array_to_string)
              ->orWhere('genero', 'LIKE', $array_to_string)              
              ->paginate(4);*/



              
               return [
                   'products' => $products,
                   'busqueda' => $busqueda_filtrada

               ];


          }
          
    }

}
