<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use GuzzleHttp\Client;
use GuzzleHttp\Middleware;
use App\Product;
use Illuminate\Support\Facades\DB;


class ScrapingZomzomController extends Controller
{

            public function scrapping_welcome(){

              $products = Product::all();

              return view('welcome', ['products' => $products]);

            }






            public function scrapping_start(Client $client)
            {
                    $productsArray = array();
                   for ($a=0; $a < 1 ; $a++) {

                    $response = $client->request('POST', 'https://www.zoomzon.es/getOfertasFiltradas', [
                        'json'    => ['page' => $a],
                        //'handler' => $tapMiddleware($clientHandler)
                    ])->getBody();

                   $array_products = json_decode($response, true); //$response;
                   $number_products = count($array_products['ofertas']);

        /******************ARRAY DE PRODUCTOS*******************************/
                   for ($b=0; $b < $number_products; $b++) {

          /*SECCION DEL PRODUCTO*/
                    $productsArray['seccion'][] = str_replace('FIND ','',trim($array_products['ofertas'][$b]['seccion']));
          /*SECCION DEL PRODUCTO*/


            /*SECCION DEL PRODUCTO*/
                  $productsArray['modelo'][] = $array_products['ofertas'][$b]['modelo'];
            /*SECCION DEL MODELO*/



           /*SECCION DE LA IMAGEN*/

                  $productsArray['imagen'][] = $array_products['ofertas'][$b]['imagen'];
          /*SECCION DE LA IMAGEN*/

           /*SECCION DEL DESCUENTO*/

                  $productsArray['descuento'][] = $array_products['ofertas'][$b]['descuento'];
          /*SECCION DEL DESCUENTO*/

          /*SECCION DEL LINK*/

                  $productsArray['link'][] = $array_products['ofertas'][$b]['link'];
          /*SECCION DEL LINK*/

          /*SECCION DE LA TALLA*/

                  $productsArray['talla'][] = str_replace('_',' ',trim($array_products['ofertas'][$b]['talla']));
          /*SECCION DE LA TALLA*/

          /*SECCION DEL PRECIO ANTERIOR*/
                  $productsArray['precio_anterior'][] = $array_products['ofertas'][$b]['precio_anterior'];
          /*SECCION DEL PRECIO ANTERIOR*/

          /*SECCION DEL PRECIO OFERTA*/
                  $productsArray['precio_oferta'][] = $array_products['ofertas'][$b]['precio_oferta'];
          /*SECCION DEL PRECIO OFERTA*/
                   }

        /******************ARRAY DE PRODUCTOS*******************************/

          }

            //  var_dump($productsArray);
              //var_dump(count($productsArray['seccion']));

        /*******************GUARDAR PRODUCTOS***************/
        for ($c=0; $c < count($productsArray['seccion']) ; $c++) {
                 $seccion_producto        = $productsArray['seccion'][$c];
                 $seccion_modelo          = $productsArray['modelo'][$c];
                 $seccion_imagen          = $productsArray['imagen'][$c];
                 $seccion_descuento       = $productsArray['descuento'][$c];
                 $seccion_link            = $productsArray['link'][$c];
                 $seccion_talla           = $productsArray['talla'][$c];
                 $seccion_precio_anterior = $productsArray['precio_anterior'][$c];
                 $seccion_precio_oferta   = $productsArray['precio_oferta'][$c];

        }
        /*******************GUARDAR PRODUCTOS***************/

            }
}
