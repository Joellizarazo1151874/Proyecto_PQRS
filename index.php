<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
  <head>
    <title>UFPS - PQRS</title>  
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

 
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.css">
      <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.css" crossorigin="anonymous">



    <link rel="icon" href="images/ufps.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css">
    <style>.ie-panel{display: none;background: #212121;padding: 10px 0;box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3);clear: both;text-align:center;position: relative;z-index: 1;} html.ie-10 .ie-panel, html.lt-ie-10 .ie-panel {display: block;}</style>
  </head>
  <body>

    <div class="ie-panel"><img src="images/logoufps.png" height="42" width="820" alt=""></a></div>
    <div class="preloader">
      <div class="preloader-body">
        <div class="cssload-container">
          <div class="cssload-speeding-wheel"></div>
        </div>
        <p>Cargando...</p>
      </div>
    </div>
    <div class="page">
      
      <!--navegador-->
        <?php include "layouts/header.php"?>

      <!--Swiper-->
      <section class="section swiper-container swiper-slider swiper-slider-1">
        <div class="swiper-wrapper text-center text-lg-left">
          <div class="swiper-slide img-fluid" data-slide-bg="images/fondo.png">
            <?php 
      include('php/conexion.php')
    ?>
           
          </div>
          
        </div>
      </section>
      <!--About-->
      
      <section class="section section-inset-1 position-relative index-1">
        <div class="container offset-negative-1 ">
          <div class="row no-gutters">
            <div class="col-sm-6 col-lg-3 wow fadeInUp">
              <article class="box-default box-default-3">
                <div class="box-default-icon fa-pencil"></div>
                <h4 class="box-default-title">Peticiones</h4>
                <div class="box-default-text">Derecho constitucionalmente reconocido a todas las personas para formular solicitudes respetuosas, ante entidades publicas o privadas y a obtener de ellas respuestas en los terminos establecidos por la ley.</div><a class="box-default-link fa-chevron-right" href="#tipo_solicitud"></a>
              </article>
            </div>
            <div class="col-sm-6 col-lg-3 wow fadeInUp" data-wow-delay=".0s">
              <article class="box-default box-default-2">
                <div class="box-default-icon fa-gavel"></div>
                <h4 class="box-default-title">Quejas</h4>
                <div class="box-default-text">Es la manifestacion verbal o escrita de insatisfaccion hecha por una persona natural o juridica, con respecto a la conducta o actuar de un funcionario de la institucion en desarrollo de sus funciones.</div><a class="box-default-link fa-chevron-right" href="#tipo_solicitud"></a>
              </article>
            </div>
            <div class="col-sm-6 col-lg-3 wow fadeInUp" data-wow-delay=".0s">
              <article class="box-default box-default-1">
                <div class="box-default-icon fa-handshake-o"></div>
                <h4 class="box-default-title">Reclamos</h4>
                <div class="box-default-text">Es la manifestacion verbal o escrita de insatisfaccion hecha por una persona natural o juridica, sobre el incumplimiento o irregularidad de alguna de las caracteristicas de los servicios ofrecidos por la institucion.</div><a class="box-default-link fa-chevron-right" href="#tipo_solicitud"></a>
              </article>
            </div>
            <div class="col-sm-6 col-lg-3 wow fadeInUp" data-wow-delay=".0s">
              <article class="box-default">
                <div class="box-default-icon fa-comments"></div>
                <h4 class="box-default-title">Sugerencias</h4>
                <div class="box-default-text">Cualquier expresion verbal o escrita de recomendacion entregada por el ciudadano, que tiene por objeto mejorar el cervicio de la institucion, racionalizar los recursos o hacer mas participativa la gestion publica</div><a class="box-default-link fa-chevron-right" href="#tipo_solicitud"></a>
              </article>
            </div>
          </div>
        </div>
        <div class="container">
          <div class="row row-30">
            <div class="col-md-12 col-lg-12 wow fadeInUp">
              <h3>PQRS aplicativo web</h3>
              <p>La sección de Peticiones, Denuncias, Quejas, Reclamos y Sugerencias de la Universidad Francisco de Paula Santander, es un medio para canalizar la opinión de la comunidad Universitaria y la ciudadanía en general, acerca del cumplimiento de la misión y la eficacia de los procesos de la Institución en virtud de los principios de eficiencia y transparencia y de los derechos de participación e información.</p>
            </div>
          </div>
        </div>


      <div class="container" id="tipo_solicitud">
         <div class="container borde col-md-12">
          <br>
          <h3 >CREAR PQRS</h3>




          <!--RD Mailform-->
          <form action="php/usuario.php" method="POST" enctype="multipart/form-data">
            <div class="row row-30">

              <div class="col-md-3">
                  <div class="form-floating">
                    <select required class="form-select" aria-label="Default select example" name="anonimo">
                    <option selected style = 'display: none'>¿Radicar anonimamente?</option>
                    <option value="no">No</option>
                    <option value="si">Si</option>
                    </select>
                  </div>
              </div>

              <div class="col-md-3">
                  <div class="form-floating">
                    <select required class="form-select" aria-label="Default select example" name="tipo_solicitud">
                    <option selected style = 'display: none'>Tipo de solicitud</option>
                    <option value="Peticion">Peticiones</option>
                    <option value="Queja">Quejas</option>
                    <option value="Reclamo">Reclamos</option>
                    <option value="Sugerencia">Sugerencias</option>
                    </select>
                  </div>
              </div>

              <div class="col-md-3">
                  <div class="form-floating">
                    <select required class="form-select" aria-label="Default select example" name="tipo_solicitante">
                    <option selected style = 'display: none'>Tipo persona</option>
                    <option value="Natural">Natural</option>
                    <option value="Juridica">Juridica</option>
                    </select>
                  </div>
              </div>

              <div class="col-md-3">
                  <div class="form-floating">
                    <select required class="form-select" aria-label="Default select example" name="tipo_identificacion">
                    <option selected style = 'display: none'>Tipo de identificación</option>
                    <option value="CC">Cédula de Ciudadania</option>
                    <option value="TI">Tarjeta de Identidad</option>
                    <option value="NIT">NIT</option>
                    <option value="Documento Extrangero">Documento Extrangero</option>
                    <option value="Pasaporte">Pasaporte</option>
                    </select>
                  </div>
              </div>

              <div class="col-md-3">
                  <div class="form-floating">
                    <input required type="text" class="form-control" id="cc" placeholder="Número de identificacíon" name="identificacion">
                    <label for="cc">Número de identificacíon</label>
                  </div>
              </div>

              <div class="col-md-3">
                  <div class="form-floating">
                    <input required type="text" class="form-control" id="name" placeholder="Nombre" name="nombre">
                    <label for="name">Nombre</label>
                  </div>
              </div>

              <div class="col-md-3">
                  <div class="form-floating">
                    <input required type="email" class="form-control" id="email" placeholder="Correo Electrónico" name="email">
                    <label for="email">Correo Electrónico</label>
                  </div>
              </div>

              <div class="col-md-3">
                  <div class="form-floating">
                    <input required type="password" class="form-control" id="password" placeholder="contraseña" name="password">
                    <label for="email">Contraseña</label>
                  </div>
              </div>

              <div class="col-md-12">
                  <div class="form-floating">
                    <input required type="text" class="form-control" id="name" placeholder="Nombre de la mascota" name="asunto">
                    <label for="name">De manera breve indique el asunto principal de su PQRS</label>
                  </div>
              </div>


              <div class="col-12">
                  <div class="form-floating">
                    <textarea class="form-control" placeholder="Escriba su pqrs aqui" id="message" style="height: 100px" name="mensaje"></textarea>
                    <label for="message">Describa la PQRS</label>
                  </div>
              </div>

              <div class="col-md-12">
                  <div data-label="Adjunte documentos y/o anexos" class="demo-code-preview" style="text-align: justify"><br><p>Si desea Por favor adjunte un archivo consolidado que contenga los documentos, escritos, fotografías, videos, audios y/o imágenes que den soporte a su solicitud. Si desea agregar varios archivos, recuerde adjuntarlos en un (1) archivo comprimido zip, rar u otro formato de compresión de su preferencia. El tamaño máximo permitido del archivo adjunto es de 50MB. Se permite adjuntar archivos con extensiones jpg, png, gif, pdf, docx, txt, xlsx, pptx, wav, mp3, mp4, mov, avi, zip, rar u otras extensiones similares o derivadas.</p>
                  </div>
              </div>

              <div class="form-group">
                  <label for="imagen">Seleccione Archivo</label>
                  <input type="file" name="imagen" id="imagen" class="form-control">
              </div>
            </div>
            <br>  
            <div  class="col-12">
              <button class="btn btn-primary py-3 px-5" style="background-color:#C20000; color: #fff;" type="submit">Enviar</button>
            </div>
        
          </form>
          </div>
        </div>

        <br>
        <br>
        </section>
      <!--footer-->
      <?php include "layouts/footer.php"?>


    </div>
    <div class="snackbars" id="form-output-global"></div>
    <script src="js/core.min.js"></script>
    <script src="js/script.js"></script>
  </body>
</html>