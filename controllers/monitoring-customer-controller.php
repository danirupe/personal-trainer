<?php

include('config/connect.php');

$id_customer = (int)$_GET['id_customer'];

$sql_viewCustomer = "SELECT 
                    customers.id_customer,
                    customers.name,
                    customers.surname,
                    customers.email,
                    customers.birth_date,
                    customers.height,
                    customers.weight,
                    customers.id_activity,
                    customers.date_start,
                    customers.date_end,
                    /*DATE_FORMAT(customers.date_start, '%d-%m-%Y') as date_start,
                    DATE_FORMAT(customers.date_end, '%d-%m-%Y') as date_end,*/
                    customers.id_gender,
                    customers.id_service,
                    customers.id_somatico,
                    activity.activity,
                    activity.act_value,
                    genders.gender,
                    services.service,
                    t_somatico.id_somatico,
                    t_somatico.somatico
                    FROM customers
                    INNER JOIN activity ON customers.id_activity = activity.id_activity
                    INNER JOIN genders ON customers.id_gender = genders.id_gender
                    INNER JOIN services ON customers.id_service = services.id_service
                    INNER JOIN t_somatico ON customers.id_somatico = t_somatico.id_somatico
                    WHERE customers.id_customer = $id_customer";

$sql_m = $conn->prepare($sql_viewCustomer);
$sql_m->execute();
$res = $sql_m->fetch();

?>