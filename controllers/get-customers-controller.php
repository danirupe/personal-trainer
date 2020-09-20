<?php
    include('config/connect.php');

    $sql_getCustomers = "SELECT customers.id_customer, customers.name, customers.surname, customers.email, customers.date_start, customers.date_end, services.service
                        FROM customers 
                        INNER JOIN services ON customers.id_service = services.id_service";

    $sql_p = $conn->prepare($sql_getCustomers);
    $sql_p->execute();

    $res = $sql_p->fetchAll();


    // Obtener número clientes totales
    $sql_getCustomersTotal = "SELECT COUNT(*) as total FROM customers";

    $sql_total = $conn->prepare($sql_getCustomersTotal);
    $sql_total->execute();

    $resTotal = $sql_total->fetchColumn();


    // Obtener número de clientes activos
    $sql_getCustomersActive = "SELECT COUNT(*) as active FROM customers WHERE  date_start < CURDATE() AND date_end > CURDATE()";

    $sql_active = $conn->prepare($sql_getCustomersActive);
    $sql_active->execute();

    $resActive = $sql_active->fetchColumn();

    // Obtener número de clientes que vencen el próximo mes
    $sql_getCustomersProxVencido= "SELECT * FROM customers WHERE MONTH(DATE_ADD(CURDATE(),INTERVAL 1 MONTH)) = MONTH(date_end) LIMIT 4";

    $sql_proxVencido = $conn->prepare($sql_getCustomersProxVencido);
    $sql_proxVencido->execute();

    $resProxVencido = $sql_proxVencido->fetchAll();
    $resProxVencidoTotal = $sql_proxVencido->rowCount();

    // Obtener número de clientes que empiezan próximamente
    $sql_getCustomersProxInicio = "SELECT * FROM customers WHERE MONTH(DATE_ADD(CURDATE(),INTERVAL 1 MONTH)) = MONTH(date_start)";

    $sql_proxInicio = $conn->prepare($sql_getCustomersProxInicio);
    $sql_proxInicio->execute();

    $resProxInicio = $sql_proxInicio->fetchAll();
    $resProxInicioTotal = $sql_proxInicio->rowCount();
?>