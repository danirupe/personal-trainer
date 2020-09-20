<?php

    $xml = simplexml_load_file( '../dist/data/exportacion.xml' );
    
    foreach($xml as $record) {
        switch($record['type']){
            case 'HKQuantityTypeIdentifierBodyMass':
                echo "<strong>Peso: </strong>" . "Fecha: " . $record['creationDate'] . ", Valor: " . $record['value'] . "<br>";
                break;
        }
    }

?>