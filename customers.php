<?php
  include("controllers/get-customers-controller.php");
  $today = date('Y-m-d');
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
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
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
              <h1 class="m-0 text-dark">Mis clientes</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Mis clientes</li>
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
            <div class="col-md-3 col-sm-6 col-12">
              <div class="info-box">
                <span class="info-box-icon bg-info"><i class="fas fa-user"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Total clientes registrados</span>
                  <span class="info-box-number h4 mt-0 mb-0"><?php echo $resTotal['total']; ?></span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-12">
              <div class="info-box">
                <span class="info-box-icon bg-success"><i class="far fa-calendar-alt"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Clientes activos</span>
                  <span class="info-box-number h4 mt-0 mb-0"><?php echo $resActive['active']; ?></span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-12">
              <div class="info-box">
                <span class="info-box-icon bg-danger"><i class="far fa-calendar-times"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Clientes próximo vencimiento</span>
                  <span class="info-box-number h4 mt-0 mb-0"><?php echo $resProxVencidoTotal; ?></span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-12">
              <div class="info-box">
                <span class="info-box-icon bg-warning"><i class="far fa-calendar-plus"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Clientes próximo inicio</span>
                  <span class="info-box-number h4 mt-0 mb-0"><?php echo $resProxInicioTotal; ?></span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Listado de clientes</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="customerTable" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Servicio</th>
                        <th>Inicio Servicio</th>
                        <th>Fin Servicio</th>
                        <th>Estado</th>
                        <th>Seguimiento</th>
                        <th class="text-center">Acciones</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($res as $row) : ?>
                        <tr>
                          <td><?php echo $row['id_customer'] ?></td>
                          <td><?php echo $row['name'] ?></td>
                          <td><?php echo $row['email'] ?></td>
                          <td><?php echo $row['service'] ?></td>
                          <td><?php echo date("d-m-Y", strtotime($row['date_start'])) ?></td>
                          <td><?php echo date("d-m-Y", strtotime($row['date_end'])) ?></td>
                          <td>
                            <?php if ($today >= $row['date_start'] && $today <= $row['date_end']) { ?>
                              <span class="badge bg-success">Activo</span>
                            <?php } else if ($today <= $row['date_start']) { ?>
                              <span class="badge bg-warning">Pendiente</span>
                            <?php } else if ($today >= $row['date_end']) { ?>
                              <span class="badge bg-danger">Caducado</span>
                            <?php } ?>
                          </td>
                          <td>
                            <?php if($today >= $row['date_start']) { ?>
                              <a href="monitoring.php?id_customer=<?php echo $row['id_customer'] ?>" class="badge badge-dark">
                                Seguimiento <?php echo $row['total']; ?>
                              </a>
                            <?php } else { ?>
                              <a>
                                ¡Espera inicio servicio!
                              </a>
                            <?php } ?>
                          </td>
                          <td class="text-center">
                            <a href="edit-customer.php?id_customer=<?php echo $row['id_customer'] ?>">
                              <i class="fas fa-pencil-alt"></i>
                            </a>
                            <a href="#">
                              <i class="far fa-trash-alt"></i>
                            </a>
                          </td>
                        </tr>
                      <?php endforeach ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Servicio</th>
                        <th>Inicio Servicio</th>
                        <th>Fin Servicio</th>
                        <th>Estado</th>
                        <th>Seguimiento</th>
                        <th class="text-center">Acciones</th>
                      </tr>
                    </tfoot>
                  </table>
                  <a href="new-customer.php" class="btn btn-dark float-left mt-2">Nuevo cliente</a>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
          </div>
          <!-- /.row -->
          <div class="row">
            <div class="col-6">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Clientes próximo inicio</h3><br>
                  <small>Consulta los clientes a los cuales inicia su servicio contratado el próximo mes</small>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th style="width: 10px">ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th class="text-center" style="width: 140px">Inicio servicio</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($resProxInicio as $rpi) : ?>
                      <tr>
                        <td><?php echo $rpi['id_customer']; ?></td>
                        <td><?php echo $rpi['name']; ?></td>
                        <td><?php echo $rpi['email']; ?></td>
                        <td class="text-center" style="width: 140px"><?php echo date("d-m-Y", strtotime($rpi['date_start'])); ?></td>
                      </tr>
                      <?php endforeach ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col-12 -->
            <div class="col-6">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Clientes próximo vencimiento</h3><br>
                  <small>Consulta los clientes a los cuales finaliza su servicio contratado el próximo mes</small>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th style="width: 10px">ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th class="text-center" style="width: 140px">Fin servicio</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($resProxVencido as $rpv) : ?>
                        <tr>
                          <td><?php echo $rpv['id_customer']; ?></td>
                          <td><?php echo $rpv['name']; ?></td>
                          <td><?php echo $rpv['email']; ?></td>
                          <td class="text-center" style="width: 140px"><?php echo date("d-m-Y", strtotime($rpv['date_end'])); ?></td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col-12 -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
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
  <!-- DataTables -->
  <script src="plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>
  <script>
    $(function() {
      $("#customerTable").DataTable({
        "responsive": true,
        "autoWidth": false,
        "language": {
          "sProcessing": "Procesando...",
          "sLengthMenu": "Mostrar _MENU_ registros",
          "sZeroRecords": "No se encontraron resultados",
          "sEmptyTable": "Ningún dato disponible en esta tabla",
          "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
          "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
          "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
          "sInfoPostFix": "",
          "sSearch": "Buscar:",
          "sUrl": "",
          "sInfoThousands": ",",
          "sLoadingRecords": "Cargando...",
          "oPaginate": {
            "sFirst": "Primero",
            "sLast": "Último",
            "sNext": "Siguiente",
            "sPrevious": "Anterior"
          },
          "oAria": {
            "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
          },
          buttons: {
            buttons: [{
                extend: 'sNext',
                className: 'btn-dark'
              },
              {
                extend: 'sLast',
                className: 'btn-dark'
              }
            ]
          }
        }
      });
    });
  </script>
</body>

</html>