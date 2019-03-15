<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Middleware;
use App\Http\Requests;
use GuzzleHttp\Client;
use App\Product;

class ScrapingZomzomController extends Controller
{

/************CODIGO PARA EL SCRAPPING********************/
            public function scrapping_start($user,$password,Client $client)
            {
              if ($user == 'u91934839' AND $password == '3cf6763ba0e8685748e00486c7e437f8') {
                DB::table('products')->truncate();

                  $productsArray = array();
                 for ($a=0; $a < 110 ; $a++) {

                  $response = $client->request('POST', 'https://www.zoomzon.es/getOfertasFiltradas', [
                      'json'    => ['page' => $a],
                      //'handler' => $tapMiddleware($clientHandler)
                  ])->getBody();

                 $array_products = json_decode($response, true); //$response;
                 $number_products = count($array_products['ofertas']);

      /******************ARRAY DE PRODUCTOS*******************************/
                 for ($b=0; $b < $number_products; $b++) {

        /*SECCION DEL PRODUCTO*/
                  $product_seccion = str_replace('FIND ','',trim($array_products['ofertas'][$b]['seccion']));


                  $productsArray['seccion'][] = str_replace('_',' ',$product_seccion);
        /*SECCION DEL PRODUCTO*/

          /*SECCION DE LA MARCA*/
                $productsArray['marca'][] = $array_products['ofertas'][$b]['marca'];
          /*SECCION DE LA MARCA*/


          /*SECCION DEL MODELO*/
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

        /*SECCION DE LA TALLA Y TALLA PARA FILTRAR*/

              if (is_numeric($array_products['ofertas'][$b]['talla']) AND $array_products['ofertas'][$b]['talla'] < 34) {

                 if(strlen($array_products['ofertas'][$b]['talla']) <= 5) {
                      $talla_filtrada = 'Talla<34';
                   }

              //  $talla_filtrada = '<34';
              }elseif (is_numeric($array_products['ofertas'][$b]['talla']) AND $array_products['ofertas'][$b]['talla'] > 49) {

                 if(strlen($array_products['ofertas'][$b]['talla']) <= 5) {
                       $talla_filtrada = 'Talla49>';
                   }

               
              }else{

                 if(strlen($array_products['ofertas'][$b]['talla']) <= 5) {
                       $talla_filtrada = 'Talla'. str_replace('_',' ',trim($array_products['ofertas'][$b]['talla']));
                   }

                //$talla_filtrada = str_replace('_',' ',trim($array_products['ofertas'][$b]['talla']));
              }


                $productsArray['talla_filtrada'][] = $talla_filtrada;
                $productsArray['talla'][]          = str_replace('_',' ',trim($array_products['ofertas'][$b]['talla']));
        /*SECCION DE LA TALLA Y TALLA PARA FILTRAR*/

        /*SECCION DEL PRECIO ANTERIOR*/
                $productsArray['precio_anterior'][] = $array_products['ofertas'][$b]['precio_anterior'];
        /*SECCION DEL PRECIO ANTERIOR*/

        /*SECCION DEL PRECIO OFERTA*/

               $precio_range = $array_products['ofertas'][$b]['precio_oferta'];

               if ($precio_range < 25) {
                  $precio_range = 'Menos de 25';
                }elseif($precio_range >= 25 AND $precio_range <= 50){
                  $precio_range = 'De 25 hasta 50';
                }elseif($precio_range >= 50 AND $precio_range <= 100){
                  $precio_range = 'De 50 hasta 100';
                }else{
                  $precio_range = 'Mas de 100';
                } 

                $productsArray['precio_filtrada'][] = $precio_range;
                $productsArray['precio_oferta'][]   = $array_products['ofertas'][$b]['precio_oferta'];






        /*SECCION DEL PRECIO OFERTA*/

         /*SECCION DEL GENERO*/
                $productsArray['genero'][] = $array_products['ofertas'][$b]['genero'];
        /*SECCION DEL GENERO*/
                 }

      /******************ARRAY DE PRODUCTOS*******************************/

        }

          //  var_dump($productsArray);
            //var_dump(count($productsArray['seccion']));

      /*******************GUARDAR PRODUCTOS***************/
      for ($c=0; $c < count($productsArray['seccion']) ; $c++) {
               $seccion_producto        = $productsArray['seccion'][$c];
               $seccion_marca           = $productsArray['marca'][$c];
               $seccion_modelo          = $productsArray['modelo'][$c];
               $seccion_imagen          = $productsArray['imagen'][$c];
               $seccion_descuento       = $productsArray['descuento'][$c];
               $seccion_link            = $productsArray['link'][$c];              
               $seccion_talla           = $productsArray['talla'][$c];
               $seccion_talla_filtrada  = $productsArray['talla_filtrada'][$c];
               $seccion_precio_anterior = $productsArray['precio_anterior'][$c];
               $seccion_precio_oferta   = $productsArray['precio_oferta'][$c];
               $seccion_precio_filtrada = $productsArray['precio_filtrada'][$c];
               $seccion_genero          = $productsArray['genero'][$c];


               DB::table('products')->insert(
                  [
                    'seccion'         => $seccion_producto,
                    'marca'           => $seccion_marca,
                    'modelo'          => $seccion_modelo,
                    'imagen'          => $seccion_imagen,
                    'descuento'       => $seccion_descuento,
                    'link'            => $seccion_link,
                    'talla'           => $seccion_talla,
                    'talla_filtrada'  => $seccion_talla_filtrada,
                    'precio_anterior' => $seccion_precio_anterior,
                    'precio_oferta'   => $seccion_precio_oferta,
                    'precio_filtrada' => $seccion_precio_filtrada,
                    'genero'          => $seccion_genero,
                    'updated_at'      => date("Y-m-d H:i:s"),
                    'created_at'      => date("Y-m-d H:i:s"),
                 ]
              );

      }

      /*******************GUARDAR PRODUCTOS***************/

      /*REDIRECCIONAR*/
        return redirect()->route('welcome');
      /*REDIRECCIONAR*/



              }else{
                return redirect()->route('welcome');
              }


            }
          /************CODIGO PARA EL SCRAPPING********************/

}
