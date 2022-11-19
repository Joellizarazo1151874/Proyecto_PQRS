<?php  
  session_start();
  include "../php/conexion.php";
  if (!isset($_SESSION['datos_login'])) {
    header("location: ../index.php");
  }

  $arregloUsuario = $_SESSION['datos_login'];
  if ($arregloUsuario['nivel']!='cliente') {
    header("location: ../index.php"); 
  }

  $resultado = $conexion ->query("select 
    resusuario.*, pqrs.estado, pqrs.id_usuario, pqrs.fecha, pqrs.tipo_solicitud from resusuario
    inner join pqrs on resusuario.id_pqrs = pqrs.id where estado='en espera' && id_usuario='".$arregloUsuario['id_usuario']."' 
    order by id ASC")or die($conexion->error);
  $resultado2 = $conexion ->query("select 
    resusuario.*, pqrs.estado, pqrs.id_usuario, pqrs.fecha, pqrs.tipo_solicitud from resusuario
    inner join pqrs on resusuario.id_pqrs = pqrs.id where estado='en tramite' && id_usuario='".$arregloUsuario['id_usuario']."' 
    order by id ASC")or die($conexion->error);
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Mailbox</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="./dashboard/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="./dashboard/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="./dashboard/dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->

  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
<?php include "layouts/header.php"; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>PQRS En espera</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a style="color:#C20000" href="index.php">Inicio</a></li>
              <li class="breadcrumb-item active">PQRS</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- /.col -->
        <div class="col-md-12">
          <div class="card card-primary card-outline" style="border-top-color:#C20000">
            <div class="card-header">
              <h3 class="card-title">Inbox</h3>

              <div class="card-tools">
                <div class="input-group input-group-sm">
                  <input type="text" class="form-control" placeholder="Buscar PQRS">
                  <div class="input-group-append">
                    <button style="background-color:#C20000; border-color: #880000;" class="btn btn-primary">
                      <i class="fas fa-search"></i>
                    </button>
                  </div>
                </div>
              </div>
              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <div class="mailbox-controls">
                <!-- Check all button -->
                <button  type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="far fa-square"></i>
                </button>
                <div class="btn-group">
                  <button type="button" class="btn btn-default btn-sm">
                    <i class="far fa-trash-alt"></i>
                  </button>
                  <button type="button" class="btn btn-default btn-sm">
                    <i class="fas fa-reply"></i>
                  </button>
                  <button type="button" class="btn btn-default btn-sm">
                    <i class="fas fa-share"></i>
                  </button>
                </div>
                <!-- /.btn-group -->
                <a type="button" href="enEsperaUsuario.php" class="btn btn-default btn-sm">
                  <i class="fas fa-sync-alt"></i>
                </a>

                <div class="float-right">
                  1-50/200
                  <div class="btn-group">
                    <button type="button" class="btn btn-default btn-sm">
                      <i class="fas fa-chevron-left"></i>
                    </button>
                    <button type="button" class="btn btn-default btn-sm">
                      <i class="fas fa-chevron-right"></i>
                    </button>
                  </div>
                  <!-- /.btn-group -->
                </div>
                <!-- /.float-right -->
              </div>
              <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">
                  <tbody>
                    <?php  
                    while($f = mysqli_fetch_array($resultado)){
                      
                    ?>
                  <tr>
                    <td>
                      <div class="icheck-primary">
                        <input type="checkbox" value="" id="check1">
                        <label for="check1"></label>
                      </div>
                    </td>
                    
                    <td class="mailbox-name"><a class="h8" style="color: #000;">Admin</a></td>
                    <td class="mailbox-subject"><b class="h10" >Respuesta:</b> <?php echo $f['esperaU']; ?>
                    </td>
                    <td class="mailbox-subject"><?php echo $f['tipo_solicitud']; ?> - <span class="badge badge-warning"><?php echo $f['estado']; ?></span>
                    </td>
                    <td class="mailbox-attachment"></td>
                    <td class="mailbox-date"><?php echo $f['fecha']; ?></td>
                  </tr>
                  <?php  
                  }
                  while($a = mysqli_fetch_array($resultado2)){
                  ?>
                    <tr>
                    <td>
                      <div class="icheck-primary">
                        <input type="checkbox" value="" id="check1">
                        <label for="check1"></label>
                      </div>
                    </td>
                    
                    <td class="mailbox-name"><a class="h8" style="color: #000;">Admin</a></td>
                    <td class="mailbox-subject"><b class="h10" >Respuesta:</b> <?php echo $a['esperaU']; ?>
                    </td>
                    <td class="mailbox-subject"><?php echo $a['tipo_solicitud']; ?> - <span class="badge badge-info"><?php echo $a['estado']; ?></span>
                    </td>
                    <td class="mailbox-attachment"><button type="button" class="btn btn-info position-relative">
                      <i class="far fa-comment"></i>
                      <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        1
                        <span class="visually-hidden"></span>
                      </span>
                    </button></td>
                    <td class="mailbox-date"><?php echo $a['fecha']; ?></td>
                  </tr>

                  <?php  
                  } 
                  ?>
                  </tbody>
                </table>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include "layouts/footer.php"; ?>



  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="./dashboard/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="./dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="./dashboard/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="./dashboard/dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    //Enable check and uncheck all functionality
    $('.checkbox-toggle').click(function () {
      var clicks = $(this).data('clicks')
      if (clicks) {
        //Uncheck all checkboxes
        $('.mailbox-messages input[type=\'checkbox\']').prop('checked', false)
        $('.checkbox-toggle .far.fa-check-square').removeClass('fa-check-square').addClass('fa-square')
      } else {
        //Check all checkboxes
        $('.mailbox-messages input[type=\'checkbox\']').prop('checked', true)
        $('.checkbox-toggle .far.fa-square').removeClass('fa-square').addClass('fa-check-square')
      }
      $(this).data('clicks', !clicks)
    })

    //Handle starring for font awesome
    $('.mailbox-star').click(function (e) {
      e.preventDefault()
      //detect type
      var $this = $(this).find('a > i')
      var fa    = $this.hasClass('fa')

      //Switch states
      if (fa) {
        $this.toggleClass('fa-star')
        $this.toggleClass('fa-star-o')
      }
    })
  })
</script>
</body>
</html>