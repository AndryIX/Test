<?php 
require_once __DIR__ . "/../app/Data.php";

use Api\Data;

$data = json_decode(file_get_contents("php://input"));
$id = $data->id;

Data::delProduct($id);

echo '{"id": '.$id.', "status": 200}';