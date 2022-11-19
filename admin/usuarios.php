<?php  
  session_start();
  include "../php/conexion.php";
  if (!isset($_SESSION['datos_login'])) {
    header("location: ../index.php");
  }

  $arregloUsuario = $_SESSION['datos_login'];
  if ($arregloUsuario['nivel']!='admin') {
    header("location: ../index.php"); 
  }
  
  $resultado = $conexion ->query("select * from usuario order by id DESC")or die($conexion->error);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>admin</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="dashboard/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="dashboard/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="dashboard/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="dashboard/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dashboard/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="dashboard/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="dashboard/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="dashboard/plugins/summernote/summernote-bs4.min.css">
  <link rel="stylesheet" href="./dashboard/dist/css/estilo.css">
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
<br>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Datos de usuarios</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Accion</th>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>TI</th>
                    <th>Identificaion</th>
                    <th>Correo</th>
                    <th>Nivel</th>
                    <th>TS</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php  
                    while($f = mysqli_fetch_array($resultado)){
                  ?>
                  <tr>
                    <td>
                      <button style="width: 30px; height: 30px; display: inline-block;" 
                      class=" btn-primary btn-small btnEditar" 
                      data-id="<?php echo $f['id']; ?>"
                      data-nombre="<?php echo $f['nombre']; ?>"
                      data-tipo_identificacion="<?php echo $f['tipo_identificacion']; ?>"
                      data-identificacion="<?php echo $f['identificacion']; ?>"
                      data-email="<?php echo $f['email']; ?>"
                      data-nivel="<?php echo $f['nivel']; ?>"
                      data-toggle="modal" data-target="#modalEditar">
                        <i class="fa fa-edit"></i>
                      </button>
                      <button style="width: 30px; height: 30px; display: inline-block;" class=" btn-danger btn-small btnEliminar" 
                      data-id="<?php echo $f['id']; ?>"
                      data-toggle="modal" data-target="#modaEliminar">
                        <i class="fa fa-trash"></i>
                      </button>
                    </td>
                    <td><?php echo $f['id']; ?></td>
                    <td><?php echo $f['nombre']; ?></td>
                    <td><?php echo $f['tipo_identificacion']; ?></td>
                    <td><?php echo $f['identificacion']; ?></td>
                    <td><?php echo $f['email']; ?></td>
                    <td><?php echo $f['nivel']; ?></td>
                    <td><?php echo $f['tipo_solicitante']; ?></td>
                  </tr>
                  <?php  
                  }
                  ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <!-- Modal Editar -->
  <div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="modalEditar" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form action="../php/editarUsuario.php" method="POST" enctype="multipart/form-data" >
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
          
          <?php $res = $conexion -> query("select nivel from usuario") ?>
          <div class="form-group">
            <label for="nivelEdit">nivel</label>
            <select name="nivel" id="nivelEdit" class="form-control" required>
              <option selected style = 'display: none'><?php $res ?></option>
              <option value="cliente">Cliente</option>
              <option value="admin">Admin</option>
            </select>
          </div>

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
    <!-- Modal Eliminar -->
  <div class="modal fade" id="modaEliminar" tabindex="-1" role="dialog" aria-labelledby="modalEliminarLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalEliminarLabel">Eliminar Usuario</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="swal2-icon swal2-error swal2-animate-error-icon" style="display: flex;">
            <span class="swal2-x-mark">
              <span class="swal2-x-mark-line-left"></span>
              <span class="swal2-x-mark-line-right"></span>
            </span>
          </div>
        <div class="modal-body text-center">
          ¿Desea eliminar el usuario?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="button" class="btn btn-danger eliminar" data-dismiss="modal">Eliminar</button>
        </div>
      </div>
    </div>
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
<!-- DataTables  & Plugins -->
<script src="dashboard/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="dashboard/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="dashboard/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="dashboard/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="dashboard/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="dashboard/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="dashboard/plugins/jszip/jszip.min.js"></script>
<script src="dashboard/plugins/pdfmake/pdfmake.min.js"></script>
<script src="dashboard/plugins/pdfmake/vfs_fonts.js"></script>
<script src="dashboard/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="dashboard/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="dashboard/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="dashboard/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dashboard/dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "excel", "pdf", "print"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>
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
