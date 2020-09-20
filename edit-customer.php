<?php

  include("controllers/edit-customer-controller.php");
  $birthDate = date("d/m/Y", strtotime($res['birth_date']));
  $dateStart = date("d/m/Y", strtotime($res['date_start']));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>AdminLTE 3 | Starter</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <?php include "includes/nav.php"; ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <?php include "includes/sidebar.php"; ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Editar cliente: <?php echo $res['name']." ".$res['surname'] ?></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Editar cliente</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!------------------------ Main content ------------------------>
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-8">
                <div class="card card-dark">
                    <div class="card-header">
                        <h3 class="card-title">Información personal</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form role="form">
                            <div class="row">
                                <div class="col-sm-7">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="editCustomerName">Nombre</label>
                                                <input type="text" class="form-control" id="editCustomerName" placeholder="Nombre" value="<?php echo $res['name'] ?>">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="editCustomerSurname">Apellidos</label>
                                                <input type="text" class="form-control" id="editCustomerSurname" placeholder="Apellidos" value="<?php echo $res['surname'] ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="editCustomerEmail">Email</label>
                                                <input type="email" class="form-control" id="editCustomerEmail" placeholder="Email" value="<?php echo $res['email'] ?>">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Fecha de nacimiento:</label>
                                                <div class="input-group date" id="dateBirth" data-target-input="nearest">
                                                    <div class="input-group-prepend" data-target="#dateBirth" data-toggle="datetimepicker">
                                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                    </div>
                                                    <input type="text" class="form-control datetimepicker-input" data-target="#dateBirth" value="<?php echo $birthDate ?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="newCustomerImage">Añadir imagen</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="newCustomerImage">
                                                <label class="custom-file-label" for="newCustomerImage">Elegir archivo</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Sexo</label>
                                                <select class="form-control" name="newCustomerGender" disabled>
                                                    <option value="1" <?php if($res["id_gender"] == 1) { ?> selected <?php } ?>>Hombre</option>
                                                    <option value="2" <?php if($res["id_gender"] == 2) { ?> selected <?php } ?>>Mujer</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="newCustomerHeight">Altura</label>
                                                <div class="input-group">
                                                    <input type="number" class="form-control" name="newCustomerHeight" placeholder="Altura" min="100" max="230" value="<?php echo $res["height"] ?>" disabled>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">cm</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="newCustomerWeight">Peso</label>
                                                <div class="input-group">
                                                    <input type="number" class="form-control" name="newCustomerWeight" placeholder="Peso" min="20" max="250" value="<?php echo $res["weight"] ?>" disabled>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text" id="">kg</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Nivel de actividad</label>
                                                <select class="form-control" name="newCustomerActivity">
                                                    <option value="1" <?php if($res["id_activity"] == 1) { ?> selected <?php } ?>>Muy ligera</option>
                                                    <option value="2" <?php if($res["id_activity"] == 2) { ?> selected <?php } ?>>Ligera</option>
                                                    <option value="3" <?php if($res["id_activity"] == 3) { ?> selected <?php } ?>>Moderada</option>
                                                    <option value="4" <?php if($res["id_activity"] == 4) { ?> selected <?php } ?>>Activa</option>
                                                    <option value="5" <?php if($res["id_activity"] == 5) { ?> selected <?php } ?>>Muy activa</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Tipo somático</label>
                                                <select class="form-control" name="newCustomerSomatico">
                                                    <option value="1" <?php if($res["id_somatico"] == 1) { ?> selected <?php } ?>>Ectomorfo</option>
                                                    <option value="2" <?php if($res["id_somatico"] == 2) { ?> selected <?php } ?>>Mesomorfo</option>
                                                    <option value="3" <?php if($res["id_somatico"] == 3) { ?> selected <?php } ?>>Endomorfo</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <label>Servicio</label>
                                        <select class="form-control" name="newCustomerService">
                                            <option value="1" <?php if($res["id_service"] == 1) { ?> selected <?php } ?>>Dieta</option>
                                            <option value="2" <?php if($res["id_service"] == 2) { ?> selected <?php } ?>>Entrenamiento</option>
                                            <option value="3" <?php if($res["id_service"] == 3) { ?> selected <?php } ?>>Entrenamiento y dieta</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Fecha de inicio:</label>
                                        <div class="input-group date" id="serviceDateStart" data-target-input="nearest">
                                            <div class="input-group-prepend" data-target="#serviceDateStart" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                            <input type="text" class="form-control datetimepicker-input" data-target="#serviceDateStart" name="serviceDateStart" value="<?php echo $dateStart ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Duración:</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="newCustomerPeriod" value="1" <?php if($res["period"] == 1) { ?> checked <?php } ?>>
                                            <label class="form-check-label">1 mes</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="newCustomerPeriod" value="3" <?php if($res["period"] == 3) { ?> checked <?php } ?>>
                                            <label class="form-check-label">3 meses</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="newCustomerPeriod" value="6" <?php if($res["period"] == 6) { ?> checked <?php } ?>>
                                            <label class="form-check-label">6 meses</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="newCustomerPeriod" value="12" <?php if($res["period"] == 12) { ?> checked <?php } ?>>
                                            <label class="form-check-label">12 meses</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="save-customer.php" class="btn btn-dark float-right">Guardar</a>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content -->
    </div>
    <!------------------------ /.content-wrapper ------------------------>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
      <div class="p-3">
        <h5>Title</h5>
        <p>Sidebar content</p>
      </div>
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <?php include "includes/footer.php"; ?>
  </div>
  <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- MOMENT JS -->
    <script src="plugins/moment/moment.min.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <script>
        $(function () {
            $('#serviceDateStart').datetimepicker({
                format: 'DD-MM-YYYY'
            });
            $('#dateBirth').datetimepicker({
                format: 'DD-MM-YYYY'
            });
        })
    </script>
</body>
</html>
