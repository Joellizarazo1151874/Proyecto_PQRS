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


  ?>

  <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Compose Message</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="dashboard/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dashboard/dist/css/adminlte.min.css">
  <!-- summernote -->
  <link rel="stylesheet" href="dashboard/plugins/summernote/summernote-bs4.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <?php include "layouts/header.php"; ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Realizar PQRS</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a style="color:#C20000" href="index.php">Inicio</a></li>
              <li class="breadcrumb-item active">Realizar PQRS</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">

          <!-- /.col -->
          <div class="col-md-12">
            <div class="card card-primary card-outline" style="border-top-color:#C20000">
              <div class="card-header">
                <h3 class="card-title">Realizar nuevo PQRS</h3>
              </div>
              <!-- /.card-header -->
              <form action="../php/usuario.php" method="POST" enctype="multipart/form-data">
              <div class="card-body">
                <input type="hidden" id="idEdit" name="id_usuario" value="<?php echo $arregloUsuario['id_usuario']; ?>">
                <div class="form-group">
                    <select required class="form-control" aria-label="Default select example" name="anonimo">
                    <option selected style = 'display: none'>¿Radicar anonimamente?</option>
                    <option value="no">No</option>
                    <option value="si">Si</option>
                    </select>
                </div>
                <div class="form-group">
                    <select required class="form-control" aria-label="Default select example" name="tipo_solicitud">
                    <option selected style = 'display: none'>Tipo de solicitud</option>
                    <option value="Peticion">Peticiones</option>
                    <option value="Queja">Quejas</option>
                    <option value="Reclamo">Reclamos</option>
                    <option value="Sugerencia">Sugerencias</option>
                    </select>
                  </div>
                <div class="form-group">
                  <input required class="form-control" placeholder="Asunto" name="asunto">
                </div>


                <div class="form-group">
                  <div class="form-floating">
                    <textarea required class="form-control" placeholder="Escriba su pqrs aqui" id="message" style="height: 100px" name="mensaje"></textarea>
                  </div>
              </div>


                <div class="form-group">

                 <div class="btn btn-default btn-file">
                    <i class="fas fa-paperclip"></i> Si desea puede subir un archivo
                    <input type="file" name="imagen" id="imagen" class="form-control">
                  </div>
                </div>

                <div class="float-right">
                  
                  <button type="submit" class="btn btn-danger"><i class="far fa-envelope"></i> Enviar</button>
                </div>
                

              </div>
              </form>
              <!-- /.card-body -->
              
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
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
<script src="dashboard/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dashboard/dist/js/adminlte.min.js"></script>
<!-- Summernote -->
<script src="dashboard/plugins/summernote/summernote-bs4.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dashboard/dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    //Add text editor
    $('#compose-textarea').summernote()
  })
</script>
</body>
</html>
