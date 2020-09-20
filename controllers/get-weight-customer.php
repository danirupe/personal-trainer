<?php
    include('../config/connect.php');

    $id_customer = $_GET['id_customer'];
    //echo $id_customer;
    // TO-DO id_customer, weight, DATE_FORMAT(date, '%d-%m-%Y') para formatear la fecha
    $sql_getWeight = "SELECT id, id_customer, weight, DATE_FORMAT(date, '%d-%m-%Y') as date FROM c_weight WHERE id_customer = ? ORDER BY date";

    $sql_w = $conn->prepare($sql_getWeight);
    $sql_w->execute(array($id_customer));

    $resWeight = $sql_w->fetchAll();

    $data = array();
    foreach ($resWeight as $row) {
        $data[] = $row;
    }
    
    $resWeight = null;
    
    $conn = null;
    
    print json_encode($data);
    
?>