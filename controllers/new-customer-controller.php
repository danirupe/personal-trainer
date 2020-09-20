<?php
    include('../config/connect.php');

    $error = '';

    if(empty($_POST['newCustomerName'])) {
        $error = "El nombre del cliente es obligatorio.<br>";
    } else {
       $newCustomerName = $_POST['newCustomerName'];
       $newCustomerName = filter_var($newCustomerName, FILTER_SANITIZE_STRING);
    }
    //echo $newCustomerName."<br>";

    if(empty($_POST['newCustomerSurname'])) {
        $error .= "Los apellidos del cliente son obligatorios.<br>";
    } else {
       $newCustomerSurname = $_POST['newCustomerSurname'];
       $newCustomerSurname = filter_var($newCustomerSurname, FILTER_SANITIZE_STRING);
    }
    //echo $newCustomerSurname."<br>";

    if(!empty($_POST['newCustomerEmail'])) {
        $newCustomerEmail = $_POST['newCustomerEmail'];
        if(!filter_var($newCustomerEmail, FILTER_VALIDATE_EMAIL)){
            $error .= "El formato de email no es correcto.";
        } else {
            $newCustomerEmail = filter_var($newCustomerEmail, FILTER_SANITIZE_EMAIL);
        }
    } else {
        $error .= "El correo electrónico es obligatorio.<br>";
    }
    //echo $newCustomerEmail."<br>";

    if(empty($_POST['dateBirth'])) {
        $error .= "Debe introducir una fecha de nacimiento para poder calcular su edad.<br>";
    } else {
       $dateBirth = $_POST['dateBirth'];
       $dateBirth = date('Y-m-d',strtotime($dateBirth));
    }
    //echo $dateBirth."<br>";

    if(empty($_POST['newCustomerGender'])) {
        $error .= "Por favor, seleccione un sexo para poder obtener los datos más precisos.<br>";
    } else {
       $newCustomerGender = $_POST['newCustomerGender'];
    }
    //echo $newCustomerGender."<br>";

    if(empty($_POST['newCustomerHeight'])) {
        $error .= "La altura es un campo obligatorio.<br>";
    } else {
       $newCustomerHeight = $_POST['newCustomerHeight'];
       $newCustomerHeight = filter_var($newCustomerHeight, FILTER_SANITIZE_NUMBER_INT);
    }
    //echo $newCustomerHeight."<br>";

    if(empty($_POST['newCustomerWeight'])) {
        $error .= "El peso es un campo obligatorio.<br>";
    } else {
       $newCustomerWeight = $_POST['newCustomerWeight'];
       $newCustomerWeight = filter_var($newCustomerWeight, FILTER_SANITIZE_NUMBER_FLOAT);
    }
    //echo $newCustomerWeight."<br>";

    if(empty($_POST['newCustomerActivity'])) {
        $error .= "Por favor, seleccione el nivel de actividad para obtener datos más exactos.<br>";
    } else {
       $newCustomerActivity = $_POST['newCustomerActivity'];
    }
    //echo $newCustomerActivity."<br>";

    if(empty($_POST['newCustomerSomatico'])) {
        $error .= "Debe seleccionar un tipo somático.<br>";
    } else {
       $newCustomerSomatico = $_POST['newCustomerSomatico'];
    }
    //echo $newCustomerSomatico."<br>";

    if(empty($_POST['newCustomerService'])) {
        $error .= "Por favor, seleccione el servicio contratado.<br>";
    } else {
       $newCustomerService = $_POST['newCustomerService'];
    }
    //echo $newCustomerService."<br>";

    if(empty($_POST['serviceDateStart'])) {
        $error .= "La fecha de inicio de asesoria es obligatoria.<br>";
    } else {
       $serviceDateStart = $_POST['serviceDateStart'];
       $serviceDateStart = date('Y-m-d',strtotime($serviceDateStart));
       //echo(gettype($serviceDateStart)); //STRING
    }
    //echo $serviceDateStart."<br>";

    if(empty($_POST['newCustomerPeriod'])) {
        $error .= "Por favor, seleccione el periodo contratado.<br>";
    } else {
       $newCustomerPeriod = $_POST['newCustomerPeriod'];
    }
    //echo $newCustomerPeriod."<br>";

    $serviceDateEnd = strtotime ('+'.$newCustomerPeriod.' month' , strtotime ($serviceDateStart)) ;
    $serviceDateEnd = date('Y-m-d' , $serviceDateEnd);


    /*echo("<pre>");
    var_dump($error);
    echo("</pre>");*/

    if($error == ''){
        echo 'success';
        $sql_newCustomer = "INSERT INTO customers (name, surname, email, birth_date, avatar_url, id_gender, height, weight, id_activity, id_service, date_start, period, date_end, id_somatico) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $sql_n = $conn->prepare($sql_newCustomer);
        $sql_n->execute(array($newCustomerName, $newCustomerSurname, $newCustomerEmail, $dateBirth, 'foto.jpg', $newCustomerGender, $newCustomerHeight, $newCustomerWeight, $newCustomerActivity, $newCustomerService, $serviceDateStart, $newCustomerPeriod, $serviceDateEnd, $newCustomerSomatico));

    } else {
        echo $error;
    }

?>