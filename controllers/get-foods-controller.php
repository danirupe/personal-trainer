<?php

require_once 'vendor/autoload.php';

use StaticKidz\BedcaAPI\BedcaClient;

$client = new BedcaClient();

/*********** LISTAR PRODUCTOS ***********/

$prop = $client->getFoods();
//print_r($prop);
$array = json_decode( json_encode( $prop ), true );


?>