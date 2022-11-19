<?php 
	include "conexion.php";

if (isset($_POST['espera'])) {
	
	$conexion->query("insert into resusuario (esperaU, id_pqrs) values(
	'".$_POST['espera']."',
	'".$_POST['id_pqrs']."'
)")or die($conexion->error);
	$enEspera='en espera';
	
	$conexion->query("update pqrs set 
		estado='".$enEspera."' where id=".$_POST['id_pqrs']);
	header("location: ../admin/activasAdmin.php");
}

else if (isset($_POST['asuntoResU'])) {
	
	if ($_FILES['imagen']['name']!='') {
			$carpeta="../admin/archivos/";
			$nombre = $_FILES['imagen']['name'];
			$peso = (round((($_FILES['imagen']['size']/1024)*10)))/10;
			$temp=explode('.',$nombre);
			$extension= end($temp);
			$nombreFinal = time().'.'.$extension;

			if ($extension=='jpg' || $extension=='png' || $extension=='JPG' || $extension=='PNG' || $extension=='pdf' || $extension=='docx.pdf' || $extension=='docx' || $extension=='gif' || $extension=='xlsx' || $extension=='pptx' || $extension=='wav' || $extension=='mp3' || $extension=='mp4' || $extension=='mov' || $extension=='avi' || $extension=='zip' || $extension=='rar' || $extension=='txt') {
				if (move_uploaded_file($_FILES['imagen']['tmp_name'], $carpeta.$nombreFinal)) {

					$conexion->query("update resusuario set 
						asuntoResU='".$_POST['asuntoResU']."',
						respuestaU='".$_POST['respuestaU']."',
						imagen='".$nombreFinal."',
						nombre_img='".$nombre."',
						peso=".$peso."
						where id_pqrs=".$_POST['id_pqrs']);
					
					$resuelto='Resuelto';
					
					$conexion->query("update pqrs set 
						estado='".$resuelto."' where id=".$_POST['id_pqrs']);
					header("location: ../admin/enEsperaAdmin.php");

				}
			}else{
				echo "formato de archivo no permitido";
			}
		}else{
			$conexion->query("update resusuario set 
						asuntoResU='".$_POST['asuntoResU']."',
						respuestaU='".$_POST['respuestaU']."'
						where id_pqrs=".$_POST['id_pqrs']);
					
					$resuelto='Resuelto';
					
					$conexion->query("update pqrs set 
						estado='".$resuelto."' where id=".$_POST['id_pqrs']);
					header("location: ../admin/enEsperaAdmin.php");
		}

}else{
	echo "hubo un problema";
}


if (isset($_POST['revisado'])) {
	

	$anonimoRes='revisado';
	
	$conexion->query("update pqrs set 
		estado='".$anonimoRes."' where id=".$_POST['id_pqrs']);
	header("location: ../admin/anonimas.php");
}

if (isset($_POST['noSolucion'])) {
	$time=time();
	$hora=date("Y-m-d(H:i:s)",$time);
	$conexion->query("update resusuario set 
						noSolucion='".$_POST['noSolucion']."',
						hora='".$hora."'
						where id_pqrs=".$_POST['id_pqrs']);

	$enProceso='en tramite';
	
	$conexion->query("update pqrs set 
		estado='".$enProceso."' where id=".$_POST['id_pqrs']);
	header("location: ../admin/resueltasUsuario.php");
}

if (isset($_POST['clasificacion'])) {
	

	$conexion->query("insert into encuesta (clasificacion, opninion, id_resusuario) values(
	'".$_POST['clasificacion']."',
	'".$_POST['opninion']."',
	'".$_POST['id_resusuario']."'
)")or die($conexion->error);

	$terminado='terminado';
	
	$conexion->query("update pqrs set 
		estado='".$terminado."' where id=".$_POST['id_pqrs']);
	header("location: ../admin/resueltasUsuario.php");
}

?>