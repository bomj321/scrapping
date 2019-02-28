<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use GuzzleHttp\Client;
use GuzzleHttp\Middleware;


class ScrapingZomzomController extends Controller
{
    public function scrapping_start(Client $client)
    {


      // Grab the client's handler instance.
        /*    $clientHandler = $client->getConfig('handler');
            // Create a middleware that echoes parts of the request.
            $tapMiddleware = Middleware::tap(function ($request) {
                echo $request->getHeaderLine('Content-Type');
                // application/json
                echo $request->getBody();
                // {"foo":"bar"}
            });*/

            $productsArray = array();
           for ($a=0; $a < 3 ; $a++) {

            $response = $client->request('POST', 'https://www.zoomzon.es/getOfertasFiltradas', [
                'json'    => ['page' => $a],
                //'handler' => $tapMiddleware($clientHandler)
            ])->getBody();

           $array_products = json_decode($response, true); //$response;
           $number_products = count($array_products['ofertas']);

           for ($b=0; $b < $number_products; $b++) {
            $productsArray['nombre'][] = str_replace('FIND ','',trim($array_products['ofertas'][$b]['articulo']));
           }


  }

  var_dump($productsArray);




    }
}
