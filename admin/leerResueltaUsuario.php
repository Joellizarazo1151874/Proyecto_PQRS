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
    resusuario.*, pqrs.estado, pqrs.id_usuario, pqrs.fecha, pqrs.tipo_solicitud from resusuario
    inner join pqrs on resusuario.id_pqrs = pqrs.id where estado='resuelto' && id_usuario='".$arregloUsuario['id_usuario']."'
    order by id ASC")or die($conexion->error);
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
  <link rel="stylesheet" href="./dashboard/dist/css/estilo.css">
  <!-- Font Awesome -->

<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


 

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
            <h1 class="card-title">Estado <span class="badge badge-info"><?php echo $f['estado']; ?></span></h1>
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
                <a href="resueltasUsuario.php" type="button" class="btn btn-default btn"><i class="fas fa-reply"></i> Volver</a>
              </div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <div class="mailbox-read-info">
                <h5><b>Admin</b><span  style="color:#444" class="mailbox-read-time float-right"><?php echo $f['fecha']; ?></span>
                  </h5>
                
              </div>
              <!-- /.mailbox-read-info -->
              <div class="mailbox-read-info with-border ">

                <h5>  <?php echo $f['asuntoResU']; ?></h5>

              </div>
              <!-- /.mailbox-controls -->
              <div class="mailbox-read-message">
                <p ><?php echo $f['respuestaU']; ?></p>
              </div>
              <!-- /.mailbox-read-message -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer bg-white">
              <ul class="mailbox-attachments d-flex align-items-stretch clearfix">
                <?php
                  if ($f['imagen']!='default.jpg') {
                ?>
                <li>
                  <?php
                  $temp=explode('.',$f['imagen']);
                  $extension= end($temp);
                    if ($extension=='pdf'){
                  ?>
                  <span class="mailbox-attachment-icon"><i class="far fa-file-pdf"></i></span>
                  <?php  
                  }else if ($extension=='jpg' || $extension=='JPG' || $extension=='png' || $extension=='PNG') {
                    ?>
                  <span class="mailbox-attachment-icon has-img"><img src="archivos/<?php echo $f['imagen']; ?>" alt="Attachment"></span>
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
                    <a target="_blank" href="archivos/<?php echo $f['imagen']; ?>" class="mailbox-attachment-name"><br><i class="fas fa-camera"></i> <?php echo $f['nombre_img']; ?></a>
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
                    <a target="_blank" href="archivos/<?php echo $f['imagen']; ?>" class="mailbox-attachment-name"><br><i class="fas fa-paperclip"></i> <?php echo $f['nombre_img']; ?></a>
                        <span class="mailbox-attachment-size clearfix mt-1">
                          <span><?php echo $f['peso']; ?> KB</span>

                          <a target="_blank" href="archivos/<?php echo $f['imagen']; ?>" class="btn btn-default btn-sm float-right"><i class="fas fa-cloud-download-alt"></i></a>
                        </span>
                  </div>
                <?php 
                    }   
                  }
                ?>
              </ul>
              <hr>

              <div class="mailbox-read-info with-border text-center">

                <h5> ¿Se soluciono la <?php echo $f['tipo_solicitud']; ?>?</h5>
                <br>
                
                <button style="margin-right: 60px;" data-toggle="modal" data-target="#modaResponder" type="button" class="btn btn-outline-secondary btnResponder"
                > No</button>
                <button data-toggle="modal" data-target="#modalTerminar" type="button" class="btn btn-success btnResponder"
                > Si</button>

              </div>
            </div>
            

            <!-- Modal Terminado -->
            <div class="modal fade right" id="modalTerminar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
              aria-hidden="true" data-backdrop="false">
              <div class="modal-dialog modal-full-height modal-right modal-notify modal-info" role="document">
                <div class="modal-content">
                  <!--Header-->
                  <form action="../php/respuestaEspera.php" method="POST" enctype="multipart/form-data">
                  <div class="modal-header btn btn-success">
                    <p class="heading lead">Encuesta
                    </p>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true" class="white-text">×</span>
                    </button>
                  </div>

                  <!--Body-->
                  <div class="modal-body">
                    <div class="text-center">
                      <div class="swal2-icon swal2-success swal2-animate-success-icon" style="display: flex;">
                      <div class="swal2-success-circular-line-left" style="background-color: rgb(255, 255, 255);"></div>
                        <span class="swal2-success-line-tip"></span>
                        <span class="swal2-success-line-long"></span>
                        <div class="swal2-success-ring"></div> 
                        <div class="swal2-success-fix" style="background-color: rgb(255, 255, 255);"></div>
                        <div class="swal2-success-circular-line-right" style="background-color: rgb(255, 255, 255);"></div>
                      </div>
                      <p>
                        <strong>Tu opinion importa</strong>
                      </p>
                      <p>¿Tiene algunas ideas sobre cómo mejorar nuestro servicio? 
                        <strong>Danos tu opinion.</strong>
                      </p>
                    </div>

                    <hr>

                    <!-- Radio -->
                    <input type="hidden" id="idEdit" name="id_resusuario" value="<?php echo $f['id']; ?>">
                    <p class="text-center">
                      <strong>Tu clasificación</strong>
                    </p>
                    <div class="form-check mb-4">
                      <input class="form-check-input" name="clasificacion" type="radio" id="radio-179" value="5" checked>
                      <label class="form-check-label" for="radio-179">Muy bueno</label>
                    </div>

                    <div class="form-check mb-4">
                      <input class="form-check-input" name="clasificacion" type="radio" id="radio-279" value="4">
                      <label class="form-check-label" for="radio-279">Bueno</label>
                    </div>

                    <div class="form-check mb-4">
                      <input class="form-check-input" name="clasificacion" type="radio" id="radio-379" value="3">
                      <label class="form-check-label" for="radio-379">Mediocre</label>
                    </div>
                    <div class="form-check mb-4">
                      <input class="form-check-input" name="clasificacion" type="radio" id="radio-479" value="2">
                      <label class="form-check-label" for="radio-479">Malo</label>
                    </div>
                    <div class="form-check mb-4">
                      <input class="form-check-input" name="clasificacion" type="radio" id="radio-579" value="1">
                      <label class="form-check-label" for="radio-579">Muy malo</label>
                    </div>
                    <!-- Radio -->

                    <p class="text-center">
                      <strong>¿Qué podríamos mejorar?</strong>
                    </p>
                    <!--Basic textarea-->
                    <div class="md-form">
                    <label for="form79textarea">Tu mensaje</label>
                      <textarea type="text" id="form79textarea" name="opinion" class="md-textarea form-control" rows="3"></textarea>

                    </div>

                  </div>

                  <!--Footer-->
                  <div class="modal-footer justify-content-center">
                    <a type="button" style="margin-right: 40px;" class="btn btn-outline-success waves-effect" data-dismiss="modal">Cancel</a>
                    <a type="button" class="btn btn-success waves-effect waves-light">Send
                      <i class="fa fa-paper-plane ml-1"></i>
                    </a>
                    
                  </div>
                </form>
                </div>
              </div>
            </div>
            <!-- Modal: modalPoll -->


            <!-- Modal Responder -->
            <div class="modal fade" id="modaResponder" tabindex="-1" role="dialog" aria-labelledby="modalResponder" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <form action="../php/respuestaEspera.php" method="POST" enctype="multipart/form-data">
                  <div class="modal-header">
                    <h5 class="modal-title" id="modalResponderLabel">Deja un mensaje</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">

                    <input type="hidden" id="idEdit" name="id_pqrs" value="<?php echo $f['id_pqrs']; ?>">
                    <div class="form-group">
                      <label for="esperaEdit">Mensaje:</label>
                      <textarea type="text" name="noSolucion" id="esperaEdit" class="form-control"  ></textarea>
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