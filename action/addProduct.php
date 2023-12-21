<?php 
 
require_once __DIR__ . "/../app/Data.php";

use Api\Data;

$data = json_decode(file_get_contents("php://input"));
$company = $data->company;
$product = $data->product;
$price = $data->price;
$quant = $data->quant;

Data::addProduct($company, $product, $price, $quant);

echo '{"status": 200}';