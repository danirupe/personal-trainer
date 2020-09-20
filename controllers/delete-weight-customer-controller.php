<?php

    include('../config/connect.php');

    $id = $_GET["id"];

    $sql_deleteWeight = "DELETE FROM c_weight WHERE id=?";
        $sql_e = $conn->prepare($sql_deleteWeight);
        $sql_e->execute(array($id));

    echo 'success';

?>