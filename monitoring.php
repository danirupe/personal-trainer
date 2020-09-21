<?php

  include("controllers/monitoring-customer-controller.php");
  //include("controllers/get-weight-customer.php");
  include("controllers/calculadora.php");
  $today = date('Y-m-d');
  $age = date_diff(date_create($res['birth_date']), date_create($today));
  $tmb = calcTmb($res['id_gender'], $res['weight'], $res['height'], $age->format('%y'));
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
  <!-- CUSTOM CSS -->
  <link rel="stylesheet" href="dist/css/custom.css">
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
                    <h1 class="m-0 text-dark">Seguimiento del cliente</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Seguimiento</li>
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
                    <div class="col-md-3">
                        <!-- Profile Image -->
                        <div class="card card-dark card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle" src="dist/img/user1-128x128.jpg" alt="User profile picture">
                                </div>

                                <h3 class="profile-username text-center"><?php echo $res['name'], " ", $res['surname'] ?> <span class="d-none" id="id-customer"><?php echo $res['id_customer'] ?></span></h3>

                                <p class="text-muted text-center">Plan: <?php echo $res['service'] ?>
                                <?php if($today >= $res['date_start'] && $today <= $res['date_end']){ ?>
                                    <span class="badge bg-success">Activo</span>
                                <?php } else if ($today <= $res['date_start']) { ?>
                                    <span class="badge bg-warning">Pendiente</span>
                                <?php } else if ($today >= $res['date_end']) { ?>
                                    <span class="badge bg-danger">Caducado</span>
                                <?php } ?><br>
                                Inicio: <b><span class="dateStart"><?php echo date("d-m-Y", strtotime($res['date_start'])) ?></span></b> Fin: <b><?php echo date("d-m-Y", strtotime($res['date_end'])) ?></b></p>

                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>Sexo</b> <a class="float-right"><?php echo $res['gender'] ?></a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Edad</b> <a class="float-right"><?php echo $age->format('%y') ?></a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Altura</b> <a class="float-right"><?php echo $res['height'] ?> cm</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Peso <u>inicial</u></b> <a class="float-right inWeight"><span><?php echo $res['weight'] ?></span> kg</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Tipo somático</b> <a class="float-right"><?php echo $res['somatico'] ?></a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Nivel de actividad</b> <a class="float-right"><?php echo $res['activity'] ?></a>
                                    </li>
                                </ul>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                        <!-- About Me Box -->
                        <div class="card card-dark">
                            <div class="card-header">
                                <h3 class="card-title">Información</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>IMC<small>*</small>:</b> <a class="float-right"><?php calcIMC($res['weight'],$res['height']); ?></a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>IMB<small>*</small>: </b> <a class="float-right"><?php echo $tmb; ?> kcal/día</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Peso ideal<small>*</small>: </b> <a class="float-right"><?php calcPI($res['id_somatico'], $res['height'], $age->format('%y')); ?> kg</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>GET<small>*</small>: </b> <a class="float-right"> <?php calcGET($tmb, $res['act_value']); ?> kcal/día</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-3 col-sm-6 col-12">
                                
                            </div>
                            <div class="col-md-3 col-sm-6 col-12"></div>
                            <div class="col-md-3 col-sm-6 col-12"></div>
                        </div>
                        <div class="card card-dark">
                            <div class="card-header">
                                <h3 class="card-title">Peso corporal (kg)</h3><br>
                                <small>Consulta el peso corporal de tu cliente a lo largo del tiempo</small>
                            </div>
                            <div class="card-body">
                                <div class="chart">
                                    <div id="emptyMessage"  class="d-none">No tenemos datos que mostrarte, ¡añade tu primera medición ahora!</div>
                                    <canvas id="lineChartWeight" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 758px;" width="1516" height="500" class="chartjs-render-monitor"></canvas>
                                </div>
                                <button id="borrarPeso" class="btn btn-dark float-right mt-3" data-toggle="modal" data-target="#modalBorrarPeso"> Borrar medición</button>
                                <button id="nuevoPeso" class="btn btn-dark float-right mt-3 mr-3" data-toggle="modal" data-target="#modalNuevoPeso"> Nueva medición</button>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="card card-dark">
                                    <div class="card-header">
                                        <h3 class="card-title">Grasa corporal (%)</h3>
                                        <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                                        <canvas id="lineChartBodyFat" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 758px;" width="1516" height="500" class="chartjs-render-monitor"></canvas>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                            <div class="col-sm-6">
                                <div class="card card-dark">
                                    <div class="card-header">
                                        <h3 class="card-title">Grasa visceral</h3>
                                        <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                                        <canvas id="lineChartVisceralFat" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 758px;" width="1516" height="500" class="chartjs-render-monitor"></canvas>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <small>*<b>IMB</b>: Indice Metabolismo Basal; fórmula Harris-Benedict &nbsp;  *<b>IMC</b>: Indice de Masa Corporal; fórmula OMS &nbsp; *<b>Peso ideal</b>: Método Creff &nbsp; *<b>GET</b>: Gasto Energético Total &nbsp; </small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
            <div class="modal fade" id="modalNuevoPeso" style="display: none;" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Añadir nuevo peso a <?php echo $res['name'] ?></h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="newCustomerWeight" method="post">
                                <div class="alert alert-success d-none" id="alertSuccessWeight">Peso añadido correctamente</div>
                                <div class="alert alert-danger d-none" id="alertDangerWeight"></div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Fecha:</label>
                                            <div class="input-group date" id="dateWeight" data-target-input="nearest">
                                                <div class="input-group-prepend" data-target="#dateWeight" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                                <input type="text" class="form-control datetimepicker-input" data-target="#dateWeight" name="dateWeight" value="<?php echo date('d-m-Y'); ?>"> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="addCustomerWeight">Peso</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="addCustomerWeight" placeholder="Peso">
                                                <input type="number" class="d-none" name="id_customer" value="<?php echo $res['id_customer'] ?>"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                            <button type="button" id="saveCustomerWeight" class="btn btn-dark">Guardar</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
            <div class="modal fade" id="modalBorrarPeso" style="display: none;" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Borrar peso de <?php echo $res['name'] ?></h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="newCustomerWeight" method="post">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table table-bordered">
                                            <thead>                  
                                                <tr>
                                                    <th style="width: 10px" class="text-center">Id</th>
                                                    <th class="text-center">Fecha</th>
                                                    <th class="text-center">Peso</th>
                                                    <th style="width: 30px" class="text-center">Borrar</th>
                                                </tr>
                                            </thead>
                                            <tbody id="dataWeight">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" id="info">Info</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
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
  <!-- ChartJS -->
  <script src="plugins/chart.js/Chart.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>
  <!-- MOMENT JS -->
  <script src="plugins/moment/moment.min.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

  <script src="dist/js/weightCustomer.js"></script>
  <script src="dist/js/addWeightCustomer.js"></script>
  <script src="dist/js/deleteWeightCustomer.js"></script>

  <script>
    $('#dateWeight').datetimepicker({
        format: 'DD-MM-YYYY'
    });

    /*  $(function() {
        var ctxBF = document.getElementById('lineChartBodyFat').getContext('2d');
        var ctxVF = document.getElementById('lineChartVisceralFat').getContext('2d');

        var lineChartBodyFat = new Chart(ctxBF, {
            type: 'line',
            data: {
                labels: ['25-05-2020', '10-05-2020', '20-05-2020', '30-05-2020'],
                datasets: [{
                    label: 'Grasa corporal',
                    data: [40, 44, 30, 38],
                    borderColor: [
                        'rgba(54, 162, 235, 1)'
                    ],
                    borderWidth: 3,
                    fill: false
                }]
            },
            options: {
                maintainAspectRatio : false,
                responsive : true,
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            suggestedMin: 50,
                            suggestedMax: 100
                        }
                    }]
                }
            }
        });

        var lineChartVisceralFat = new Chart(ctxVF, {
            type: 'line',
            data: {
                labels: ['25-05-2020', '10-05-2020', '20-05-2020', '30-05-2020'],
                datasets: [{
                    label: 'Grasa visceral',
                    data: [40, 44, 30, 38],
                    borderColor: [
                        'rgba(54, 162, 235, 1)'
                    ],
                    borderWidth: 3,
                    fill: false
                }]
            },
            options: {
                maintainAspectRatio : false,
                responsive : true,
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            suggestedMin: 50,
                            suggestedMax: 100
                        }
                    }]
                }
            }
        });
      }) */
  </script>
</body>
</html>
