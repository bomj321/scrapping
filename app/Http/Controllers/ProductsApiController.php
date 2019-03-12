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


             $products = Product::orderBy('descuento', 'DESC')->paginate(36);
               return [
                   'products' => $products,                   

               ];

               
          
          }else{


              $products = Product::orderBy('descuento', 'DESC')->paginate(36);
               return [
                   'products' => $products,
                   'busqueda' => 'Tiene Algo' 

               ];


          }
          
    }

}
