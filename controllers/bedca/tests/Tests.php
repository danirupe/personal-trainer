<?php

require_once '../../../vendor/autoload.php';

use StaticKidz\BedcaAPI\BedcaClient;

header('Content-Type: text/html; charset=utf-8');

$client = new BedcaClient();

echo "<pre>";

/*********** LISTAR PRODUCTOS ***********/
/*
$prop = $client->getFoods();
print_r($prop);
$array = json_decode( json_encode( $prop ), true );

/*foreach($array['food'] as $clave => $valor){
    echo $valor['f_id'].": ".$valor['f_ori_name']."<br>";
    echo $valor['c_ori_name'].": ".$valor['best_location']."<br>";
}

/*********** CARACTERISTICAS PRODUCTO EDITADAS ***********/

$prop = $client->getFoodEdit(2245);

print_r($prop);
$array = json_decode( json_encode( $prop ), true );

foreach($array['food']["foodvalue"] as $clave => $valor){
    echo $valor['c_ori_name'].": ".$valor['best_location']."<br>";
}  

/*********** CARACTERISTICAS PRODUCTO ***********/
/*
$prop = $client->getFood(2245);

print_r($prop);
$array = json_decode( json_encode( $prop ), true );

foreach($array['food']["foodvalue"] as $clave => $valor){
    echo $valor['c_ori_name'].": ".$valor['best_location']."<br>";
}
*/
/*********** PRODUCTOS EN GRUPO ***********/
/*
$food = $client->getFoodsInGroup(9);
var_dump($food);
*/
echo "</pre>";
