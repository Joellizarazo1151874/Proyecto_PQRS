<?php  
  session_start();
  include "../php/conexion.php";
  if (!isset($_SESSION['datos_login'])) {
    header("location: ../index.php"); 
  }
  
  $arregloUsuario = $_SESSION['datos_login'];

  $resultado = $conexion ->query("select * from usuario where id=".$arregloUsuario['id_usuario'])or die($conexion->error);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | User Profile</title>

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

  <!-- /.navbar -->
<?php include "layouts/header.php"; ?>
  <!-- Main Sidebar Container -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Perfil</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a style="color:#C20000" href="index.php">Inicio</a></li>
              <li class="breadcrumb-item active">Perfil de usuario</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
     <?php  
                    while($f = mysqli_fetch_array($resultado)){
                  ?>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">

            <!-- Profile Image -->
            <div class="card card-primary card-outline" style="border-top-color:#C20000">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="../fotosPerfil/<?php echo $f['img_perfil']; ?>"
                       alt="<?php echo $f['nombre']; ?>">
                </div>

                <h3 class="profile-username text-center"><?php echo $f['nombre']; ?></h3>

                <p class="text-muted text-center"><?php echo $f['email']; ?></p>
               
                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Tipo de Identificacion</b> <a style="color:#C20000" class="float-right"><?php echo $f['tipo_identificacion']; ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>N-Identificaion</b> <a style="color:#C20000" class="float-right"><?php echo $f['identificacion']; ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Nivel de Usuario</b> <a style="color:#C20000" class="float-right"><?php echo $f['nivel']; ?></a>
                  </li>
                </ul>
                
                <a style="background-color:#C20000; border-color: #880000;" class="btn btn-primary btn-block btnEditar" data-id="<?php echo $f['id']; ?>"
                      data-nombre="<?php echo $f['nombre']; ?>"
                      data-tipo_identificacion="<?php echo $f['tipo_identificacion']; ?>"
                      data-identificacion="<?php echo $f['identificacion']; ?>"
                      data-email="<?php echo $f['email']; ?>"
                      data-nivel="<?php echo $f['nivel']; ?>"
                      data-toggle="modal" data-target="#modalEditar"><i class="fa fa-edit"></i><b> Editar</b></a>
              </div>
              <?php  
                  }
                  ?>
                <!-- Modal Editar -->
                <div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="modalEditar" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <form action="../php/editarPerfil.php" method="POST" enctype="multipart/form-data" >
                        <div class="modal-header">
                        <h5 class="modal-title" id="modalEditar">Editar Usuario</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <input type="hidden" id="idEdit" name="id">
                        <div class="form-group">
                          <label for="nombreEdit">Nombre</label>
                          <input type="text" name="nombre" id="nombreEdit" placeholder="nombre" class="form-control" required>
                        </div>
                        <div class="form-group">
                          <?php $res1 = $conexion -> query("select tipo_identificacion from usuario") ?>
                          <label for="tiEdit">Tipo identificacion</label>
                          <select name="tipo_identificacion" id="tiEdit" class="form-control" required>
                            <option selected style = 'display: none'><?php $res1 ?></option>
                            <option value="CC">Cédula de Ciudadania</option>
                                <option value="TI">Tarjeta de Identidad</option>
                                <option value="NIT">NIT</option>
                                <option value="Documento Extrangero">Documento Extrangero</option>
                                <option value="Pasaporte">Pasaporte</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="identificacionEdit">Identificaion</label>
                          <input type="text" name="identificacion" id="identificacionEdit" placeholder="Identificaion" class="form-control" required>
                        </div>
                        <div class="form-group">
                          <label for="emailEdit">Email</label>
                          <input type="text" name="email" id="emailEdit" placeholder="email" class="form-control" required>
                        </div>
                         <!--/ 
                          <div class="form-group">
                          <label for="passwordEdit">Contraseña</label>
                          <input type="text" name="password" id="passwordEdit" placeholder="password" class="form-control" required>
                        </div>
                         -->
                        
                         <input type="hidden" id="nivelEdit" name="nivel">

                        <div class="form-group">
                          <label for="imagen">Imagen de perfil</label>
                          <input type="file" name="imagen" id="imagen" class="form-control">
                        </div>


                      </div>

                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary editar">Guardar</button>
                      </div>
                      </form>
                      
                    </div>
                  </div>
                </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <!-- /.card -->
          </div>
          <!-- /.col -->
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
<script src="./dashboard/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="./dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="./dashboard/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="./dashboard/dist/js/demo.js"></script>
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
    $(".btnEditar").click(function(){
      idEditar=$(this).data('id');
      var nombre=$(this).data('nombre');
      var tipo_identificacion=$(this).data('tipo_identificacion');
      var identificacion=$(this).data('identificacion');
      var email=$(this).data('email');
      var nivel=$(this).data('nivel');
      $("#nombreEdit").val(nombre);
      $("#tiEdit").val(tipo_identificacion);
      $("#identificacionEdit").val(identificacion);
      $("#emailEdit").val(email);
      $("#nivelEdit").val(nivel);
      $("#idEdit").val(idEditar);
    });
  });
</script>
</body>
</html>
