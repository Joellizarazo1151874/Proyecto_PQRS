<?php 
	include "conexion.php";

if (isset($_POST['nombre']) && isset($_POST['tipo_identificacion'])  && isset($_POST['identificacion']) && isset($_POST['email']) && isset($_POST['nivel'])) {
	

		if ($_FILES['imagen']['name']!='') {
			$carpeta="../fotosPerfil/";
			$nombre = $_FILES['imagen']['name'];
			$temp=explode('.',$nombre);
			$extension= end($temp);
			$nombreFinal = time().'.'.$extension;

			if ($extension=='jpg' || $extension=='png') {
				if (move_uploaded_file($_FILES['imagen']['tmp_name'], $carpeta.$nombreFinal)) {

					$conexion->query("update usuario set 
						img_perfil='".$nombreFinal."' 
						where id=".$_POST['id']);
				}
			}
		}

	$conexion->query("update usuario set 
		nombre='".$_POST['nombre']."',
		tipo_identificacion='".$_POST['tipo_identificacion']."',
		identificacion=".$_POST['identificacion'].",
		email='".$_POST['email']."',
		nivel='".$_POST['nivel']."' where id=".$_POST['id']);
	header("location: ../admin/usuarios.php");
}

?>