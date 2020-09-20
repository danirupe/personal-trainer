<?php

    function calcIMC($weight, $height){
        $imc = number_format( ($weight)/(pow(($height/100),2)), 2);

        echo $imc;
    }

    function calcTmb($gender, $weight, $height, $age) {
        if ($gender == 1) {
            $tmb = 66.473 + (13.751 * $weight) + (5.0033 * $height) - (6.7550 * $age); // MAN
        } else {
            $tmb = 655.1 + (9.463 * $weight) + (1.8 * $height) - (4.6756 * $age); // WOMAN
        }

        return round($tmb);
    }

    function calcPI($somatico, $height, $age){
        if ($somatico == 1) { //Ectoformo
            $pi = ( ($height - 100) + ($age/10) ) * pow(0.9, 2);
        } else if ($somatico == 2){ //Mesoformo
            $pi = (($height - 100) + ($age/10))* 0.9;
        } else { //Endoformo
            $pi = ((($height - 100) + ($age/10))* 0.9) * 1;
        }

        echo $pi;
    }

    function calcGET($tmb, $activity){
        $get = number_format(($tmb * $activity) + ($tmb * 10 / 100),2, '.', '');

        echo round($get);
    }

?>