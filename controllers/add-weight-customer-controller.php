<?php
    include('../config/connect.php');

    $error = '';

    $id_customer = $_POST['id_customer'];

    if(empty($_POST['dateWeight'])) {
        $error .= "Debe introducir una fecha.<br>";
    } else {
       $dateWeight = $_POST['dateWeight'];
       $dateWeight = date('Y-m-d',strtotime($dateWeight));
    }
    //echo $dateWeight."<br>";

    if(empty($_POST['addCustomerWeight'])) {
        $error .= "El peso es un campo obligatorio.<br>";
    } else {
       $addCustomerWeight = (float)$_POST['addCustomerWeight'];
    }
    //echo $addCustomerWeight."<br>";

    /*echo("<pre>");
    var_dump($error);
    echo("</pre>");*/

    if($error == ''){
        echo 'success';
        $sql_addWeight = "INSERT INTO c_weight (id_customer, weight, date) VALUES (?,?,?)";
        $sql_aw = $conn->prepare($sql_addWeight);
        $sql_aw->execute(array($id_customer, $addCustomerWeight, $dateWeight));

    } else {
        echo $error;
    }

?>