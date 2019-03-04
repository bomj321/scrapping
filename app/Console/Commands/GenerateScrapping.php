<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

/*PARTE PARA LAS CONSULTAS*/
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Middleware;
use App\Http\Requests;
use GuzzleHttp\Client;
use App\Product;
/*PARTE PARA LAS CONSULTAS*/



class GenerateScrapping extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'GenerateScrappingCommand';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This Command generate the scrapping of ZonZom daily';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(Client $client)
    {
                        DB::table('products')->truncate();

                          $productsArray = array();
                         for ($a=0; $a < 16 ; $a++) {

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

                       DB::table('products')->insert(
                          [
                            'seccion'         => $seccion_producto,
                            'modelo'          => $seccion_modelo,
                            'imagen'          => $seccion_imagen,
                            'descuento'       => $seccion_descuento,
                            'link'            => $seccion_link,
                            'talla'           => $seccion_talla,
                            'precio_anterior' => $seccion_precio_anterior,
                            'precio_oferta'   => $seccion_precio_oferta,
                            'updated_at'      => date("Y-m-d H:i:s"),
                            'created_at'      => date("Y-m-d H:i:s"),
                         ]
                      );

                  }
                  /*******************GUARDAR PRODUCTOS***************/

    }
}
