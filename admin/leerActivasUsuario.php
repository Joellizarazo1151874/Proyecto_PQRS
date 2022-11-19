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
  if (isset($_GET['id'])) {
    $resultado = $conexion ->query("select 
    pqrs.*, usuario.nombre, usuario.email from pqrs
    inner join usuario on pqrs.id_usuario = usuario.id where pqrs.id=".$_GET['id'])or die($conexion->error);
    $resultado2 = $conexion ->query("select * from respuesta")or die($conexion->error);
    if (mysqli_num_rows($resultado) > 0) {
      
    }else{
      header("location: ./index.php");
    }
  }else{
    header("location: ./index.php");
  }
  
  ?>
   <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Read Mail</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="./dashboard/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="./dashboard/dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
<?php include "layouts/header.php"; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <?php  
          while($f = mysqli_fetch_array($resultado)){
          while($r = mysqli_fetch_array($resultado2)){
        ?>
          <div class="col-sm-6">
            <h1 class="card-title">Estado <span class="badge badge-success"><?php echo $f['estado']; ?></span></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a style="color:#C20000" href="index.php">Inicio</a></li>
              <li class="breadcrumb-item active"><?php echo $f['estado']; ?></li>
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
              <h1 class="card-title"><?php echo $f['tipo_solicitud']; ?></h1>
              <div class="card-tools">
                <div class="float-right">
                <a href="activasUsuario.php" type="button" class="btn btn-default btn"><i class="fas fa-reply"></i> Volver</a>
              </div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <div class="mailbox-read-info">
                <h5><b><?php echo $f['nombre']; ?></b>
                  </h5>
                <h8 style="color:#444"><?php echo $f['email']; ?><span  style="color:#444" class="mailbox-read-time float-right"><?php echo $f['fecha']; ?></span></h8>
                
              </div>
              <!-- /.mailbox-read-info -->
              <div class="mailbox-read-info with-border ">

                <h5>  <?php echo $f['asunto']; ?></h5>

              </div>
              <!-- /.mailbox-controls -->
              <div class="mailbox-read-message">
                <p ><?php echo $f['mensaje']; ?></p>
              </div>
              <!-- /.mailbox-read-message -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer bg-white">
              <ul class="mailbox-attachments d-flex align-items-stretch clearfix">
                <?php
                  if ($f['ruta']!='default.jpg') {
                ?>
                <li>
                  <?php
                  $temp=explode('.',$f['ruta']);
                  $extension= end($temp);
                    if ($extension=='pdf'){
                  ?>
                  <span class="mailbox-attachment-icon"><i class="far fa-file-pdf"></i></span>
                  <?php  
                  }else if ($extension=='jpg' || $extension=='JPG' || $extension=='png' || $extension=='PNG') {
                    ?>
                  <span class="mailbox-attachment-icon has-img"><img src="archivos/<?php echo $f['ruta']; ?>" alt="Attachment"></span>
                  <?php
                  }else if ($extension=='docx') {
                  ?>
                  <span class="mailbox-attachment-icon"><i class="far fa-file-word"></i></span>
                  <?php
                  }else {
                  ?>
                  <span class="mailbox-attachment-icon"><i class="far fa-file-alt"></i></span>
                  <?php
                  }
                  ?>
                      
                  <?php 
                  if ($extension=='jpg' || $extension=='JPG' || $extension=='png' || $extension=='PNG') {
                  ?>
                  <div class="mailbox-attachment-info">
                    <a target="_blank" href="archivos/<?php echo $f['ruta']; ?>" class="mailbox-attachment-name"><br><i class="fas fa-camera"></i> <?php echo $f['nombre_archivo']; ?></a>
                        <span class="mailbox-attachment-size clearfix mt-1">
                          <span><?php echo $f['peso']; ?> KB</span>
                          <a target="_blank" href="#" class="btn btn-default btn-sm float-right"><i class="fas fa-cloud-download-alt"></i></a>
                        </span>
                  </div>
                </li>
                <?php
                    }else{
                ?>
                  <div class="mailbox-attachment-info">
                    <a target="_blank" href="archivos/<?php echo $f['ruta']; ?>" class="mailbox-attachment-name"><br><i class="fas fa-paperclip"></i> <?php echo $f['nombre_archivo']; ?></a>
                        <span class="mailbox-attachment-size clearfix mt-1">
                          <span><?php echo $f['peso']; ?> KB</span>

                          <a target="_blank" href="archivos/<?php echo $f['ruta']; ?>" class="btn btn-default btn-sm float-right"><i class="fas fa-cloud-download-alt"></i></a>
                        </span>
                  </div>
                <?php 
                    }   
                  }
                ?>
              </ul>
            </div>
            

            <!-- Modal Responder -->
            <div class="modal fade" id="modaResponder" tabindex="-1" role="dialog" aria-labelledby="modalResponder" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <form action="../php/respuestaEspera.php" method="POST" enctype="multipart/form-data">
                  <div class="modal-header">
                    <h5 class="modal-title" id="modalResponderLabel">Respuesta automatica:</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">

                    <input type="hidden" id="idEdit" name="id_pqrs" value="<?php echo $f['id']; ?>">
                    <div class="form-group">
                      <label for="esperaEdit">Mensaje:</label>
                      <input type="text" name="espera" id="esperaEdit" placeholder="espera" class="form-control" required value="Su <?php echo $f['tipo_solicitud']; ?> <?php echo $r['espera']; ?>">
                    </div>

                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-warning enviar">Enviar</button>
                  </div>
                  </form>
                </div>
              </div>
            </div>

          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      </div><!-- /.container-fluid -->
      <?php  
        }
        }
      ?>
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
<script>
  $(document).ready(function(){
     var idEliminar=-1;
    var idEditar=-1;
    var fila;
    $(".btnEliminar").click(function(){
      idEliminar=$(this).data('id');
      fila=$(this).parent('td').parent('tr');
    });
    $(".eliminar").click(function(){
      $.ajax({
        url: '../php/eliminarUsuario.php',
        method: 'POST',
        data:{
          id: idEliminar
          }
      }).done(function(res){
        $(fila).fadeOut(1000);
      });
    });
    $(".btnResponder").click(function(){
      idEditar=$(this).data('id');
      var espera=$(this).data('espera');
      $("#esperaEdit").val(espera);
      $("#idEdit").val(idEditar);
    });
  });
</script>
<!-- jQuery -->
<script src="./dashboard/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="./dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="./dashboard/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="./dashboard/dist/js/demo.js"></script>
</body>
</html>