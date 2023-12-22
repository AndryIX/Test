<?php 
require_once __DIR__ . "/../app/Data.php";

use Api\Data;

$data = Data::getProducts();
$length = count($data);

foreach($data as $index => $value){
        $response .= '{ 
            "id": '.$index.',
            "company": "'.$value[0].'",
            "product": "'.$value[1].'",
            "price": '.$value[2].',
            "quant": '.$value[3].'
        }';
        $index < $length - 1 ? $response .= ",": null;
};

print_r("[".$response."]");

