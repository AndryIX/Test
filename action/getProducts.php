<?php 
require_once __DIR__ . "/../app/Data.php";

use Api\Data;

$data = Data::getProducts();
$length = count($data);

foreach($data as $index => $value){
   if($index < $length - 1) { 
        $response .= '{ 
            "id": '.$index.',
            "company": "'.$value[0].'",
            "product": "'.$value[1].'",
            "price": '.$value[2].',
            "quant": '.$value[3].'
        },';
    } else {
        $response .= '{ 
            "id": '.$index.',
            "company": "'.$value[0].'",
            "product": "'.$value[1].'",
            "price": '.$value[2].',
            "quant": '.$value[3].'
        }';
    }
};

print_r("[".$response."]");

