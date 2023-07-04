<?php

namespace App\Traits;

trait Common {

   public function fetchdata(){
    $apiUrl = 'http://localhost:8001/employees';
        $curl = curl_init($apiUrl);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, ['Content-Type: application/json']); 
        $response = curl_exec($curl);
        curl_close($curl);
        if ($response === false) {
            $error = curl_error($curl);
        }
        $data = json_decode($response, true);
        return $data;
   }
}