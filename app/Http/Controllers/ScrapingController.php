<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Goutte\Client;
use App\Http\Requests;
class ScrapingController extends Controller
{
    
    protected $contacts;


    public function example(Client $client){
        
       
        
        for($i=1; $i<=19; ++$i){
            $offset = ($i-1)*20;
            $pageUrl = "http://www.ampidf.com.mx/es/directorioprofesionalesinmobiliarios/?Desplazamiento=$offset";
        
        
             $crawler = $client->request('GET',$pageUrl);        
            $this->extractContactsFrom($crawler);
        }
        
         return $this->startDownloadCSV();
    }
    
    public function startDownloadCSV()
    {
        //CREAR ARCHIVO CSV
        $fileName = date('Y-m-d').'.csv';
        $filePath = public_path($fileName);
        $file = fopen($filePath, 'w');
        //LLENAR ESTE ARCHIVO      
        
        foreach ($this->contacts as $contact){
            fputcsv($file, $contact);
        }
        //GENERAR 1 DESCARGA
        
        return response()->download($fileName);
    }
    
    public function extractContactsFrom($crawler)
    {
        
        $inlineContactStyles = 'background-color: #DDEDC2;background-image: url("/images/BoxNoticia.jpg");background-position: center top; overflow:hidden; height:100%;margin-bottom:10px;';
        $crawler->filter("[style='$inlineContactStyles']")->each(function ($contactNode){
            
            $divs = $contactNode->children()->filter('div');
            
            $sectionInfo = $divs->eq(0);
            
            //$name= $sectionInfo->filter("[class='verdebold negritas']")->first()->text();
            
            $textInfo = $sectionInfo->text();
            
            $contact = $this->extractContactInfo($textInfo);
            
            
          
            
            $sectionPhones = $divs->eq(1); 
            $phones = $sectionPhones->text();
            $contact['phones'] = $phones;
            
            $this->contacts[] = $contact;

         
        });
        
    }
    
    public function extractContactInfo($textInfo)
    {
        $contact = [];
        $parts = explode('Sección: ', $textInfo);
            $contact['name'] = $parts[0];
            $textInfo = $parts[1];
            
            $parts = explode('Email: ', $textInfo);
            
            $contact['section'] = $parts[0];
            $textInfo = $parts[1];
            
            $parts = explode('Más Información',$textInfo);
            $contact['email'] = $parts[0];
            return $contact;
    }
}
