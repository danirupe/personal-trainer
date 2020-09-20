<?php
    include('config/connect.php');

    $id_customer = (int)$_GET['id_customer'];

    $sql_editCustomer = "SELECT customers.id_customer, customers.name, customers.surname, customers.email, customers.birth_date, customers.date_start, customers.id_service, customers.period, customers.weight, customers.height, customers.id_activity, customers.id_gender, customers.id_somatico
                        FROM customers
                        WHERE customers.id_customer = $id_customer";

    $sql_p = $conn->prepare($sql_editCustomer);
    $sql_p->execute();

    $res = $sql_p->fetch();
?>