<?php
    include("config.php");

    try {
        $conn = new PDO($host, $user, $pass);
        //echo "Conectado";
    } catch (PDOException $e){
        echo "¡Error! No se pudo conectado a la base de datos. " . $e;
        die();
    }

?>