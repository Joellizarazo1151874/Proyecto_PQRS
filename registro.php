<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PQRS Registro</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="admin/dashboard/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="admin/dashboard/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="icon" href="images/ufps.ico" type="image/x-icon">
  <link rel="stylesheet" href="admin/dashboard/dist/css/adminlte.min.css">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="card card-outline card-primary "style="border-top-color:#C20000">
    <div class="card-header text-center">
      <a href="index.php" style="color:#C20000" class="h1"><b>PQRS </b> Registro</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Registrar nuevo usuario</p>

      <form action="php/registroUsuario.php" method="post">
        <div class="input-group mb-3">
          <select required class="form-control" aria-label="Default select example" name="tipo_solicitante">
                  <option selected style = 'display: none'>Tipo persona</option>
                  <option value="Natural">Natural</option>
                  <option value="Juridica">Juridica</option>
                  </select>
                  <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-clipboard"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          
          <select required class="form-control" aria-label="Default select example" name="tipo_identificacion">
                  <option selected style = 'display: none'>Tipo de identificación</option>
                  <option value="CC">Cédula de Ciudadania</option>
                  <option value="TI">Tarjeta de Identidad</option>
                  <option value="NIT">NIT</option>
                  <option value="Documento Extrangero">Documento Extrangero</option>
                  <option value="Pasaporte">Pasaporte</option>
                  </select>

                  <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-file-alt"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input required type="text" class="form-control" id="cc" placeholder="Número de identificacíon" name="identificacion">

          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-pencil-alt"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input required type="text" class="form-control" id="name" placeholder="Nombre" name="nombre">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input required type="email" class="form-control " id="email" placeholder="Correo Electrónico" name="email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input required type="password" class="form-control" id="password" placeholder="contraseña" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
         </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block" style="background-color:#C20000; border-color: #880000;">Registrar</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <a href="login.php" class="text-center">Ya tengo una cuenta</a>
    </div>
    <!-- /.form-box a-->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="admin/dashboard/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="admin/dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="admin/dashboard/dist/js/adminlte.min.js"></script>
</body>
</html>
