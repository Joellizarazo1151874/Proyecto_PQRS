<?php 
session_start();
include "conexion.php";

if (isset($_POST['email']) && isset($_POST['password'])) {
	$resultado = $conexion -> query("select * from usuario where email='".$_POST['email']."' and 
		password='".sha1($_POST['password'])."' ")or die($conexion->error);
	if (mysqli_num_rows($resultado)>0) {
		$datos_usuario = mysqli_fetch_row($resultado);
		$nombre = $datos_usuario[1];
		$id_usuario = $datos_usuario[0];
		$tipo_iden = $datos_usuario[3];
		$iden = $datos_usuario[4];
		$email = $datos_usuario[5];
		$imagen_perfil = $datos_usuario[7];
		$nivel = $datos_usuario[8];
		
		$_SESSION['datos_login']=array(
			'nombre' => $nombre,
			'id_usuario'=> $id_usuario,
			'tipo_identificacion' => $tipo_identificacion,
			'identificacion' => $identificacion,
			'email' => $email,
			'imagen' => $imagen_perfil,
			'nivel' => $nivel
		);
		header("location: ../admin/index.php");
	}else{
		header("location: ../login.php?error=Credenciales incorrectas");
	}
}else{
	header("location: ../login.php");
}

?>