<?php 
session_start();
include 'conexion.php';
$password = "";
if ($_POST['anonimo'] == "no" && $_POST['nombre'] != "" && $_POST['identificacion'] != "" && $_POST['email'] != "") {
	if ($_POST['password']!="") {
		$password = $_POST['password'];
	}

$conexion->query("insert into usuario (nombre, tipo_solicitante, tipo_identificacion, identificacion, email, password, img_perfil, nivel) values(
	'".$_POST['nombre']."',
	'".$_POST['tipo_solicitante']."',
	'".$_POST['tipo_identificacion']."',
	'".$_POST['identificacion']."',
	'".$_POST['email']."',
	'".sha1($password)."',
	'default.jpg',
	'cliente'
)")or die($conexion->error);
$id_usuario = $conexion-> insert_id;
$fecha = date('y-m-d', $time);

		if ($_FILES['imagen']['name']!='') {
			$carpeta="../admin/archivos/";
			$nombre = $_FILES['imagen']['name'];
			$peso = (round((($_FILES['imagen']['size']/1024)*10)))/10;
			$temp=explode('.',$nombre);
			$extension= end($temp);
			$nombreFinal = time().'.'.$extension;

			if ($extension=='jpg' || $extension=='png' || $extension=='JPG' || $extension=='PNG' || $extension=='pdf' || $extension=='docx.pdf' || $extension=='docx' || $extension=='gif' || $extension=='xlsx' || $extension=='pptx' || $extension=='wav' || $extension=='mp3' || $extension=='mp4' || $extension=='mov' || $extension=='avi' || $extension=='zip' || $extension=='rar' || $extension=='txt') {
				if (move_uploaded_file($_FILES['imagen']['tmp_name'], $carpeta.$nombreFinal)) {

					$conexion->query("insert into pqrs (tipo_solicitud, asunto, mensaje, ruta, nombre_archivo, peso, anonimo, fecha, estado, id_usuario) values(
						'".$_POST['tipo_solicitud']."',
						'".$_POST['asunto']."',
						'".$_POST['mensaje']."',
						'$nombreFinal',
						'$nombre',
						'$peso',
						'".$_POST['anonimo']."',
						'$fecha',
						'activo',
						'$id_usuario'
						)")or die($conexion->error);
						header("location: ../index.php");
				}
			}else{
				echo "formato de archivo no permitido";
			}
		}else{
			$conexion->query("insert into pqrs (tipo_solicitud, asunto, mensaje, ruta, anonimo, fecha, estado, id_usuario) values(
						'".$_POST['tipo_solicitud']."',
						'".$_POST['asunto']."',
						'".$_POST['mensaje']."',
						'default.jpg',
						'".$_POST['anonimo']."',
						'$fecha',
						'activo',
						'$id_usuario'
						)")or die($conexion->error);
						header("location: ../index.php");
		}

}else if (isset($_POST['id_usuario']) &&  $_POST['anonimo'] == "no") {
	$fecha = date('y-m-d', $time);

		if ($_FILES['imagen']['name']!='') {
			$carpeta="../admin/archivos/";
			$nombre = $_FILES['imagen']['name'];
			$peso = (round((($_FILES['imagen']['size']/1024)*10)))/10;
			$temp=explode('.',$nombre);
			$extension= end($temp);
			$nombreFinal = time().'.'.$extension;

			if ($extension=='jpg' || $extension=='png' || $extension=='JPG' || $extension=='PNG' || $extension=='pdf' || $extension=='docx.pdf' || $extension=='docx' || $extension=='gif' || $extension=='xlsx' || $extension=='pptx' || $extension=='wav' || $extension=='mp3' || $extension=='mp4' || $extension=='mov' || $extension=='avi' || $extension=='zip' || $extension=='rar' || $extension=='txt') {
				if (move_uploaded_file($_FILES['imagen']['tmp_name'], $carpeta.$nombreFinal)) {

					$conexion->query("insert into pqrs (tipo_solicitud, asunto, mensaje, ruta, nombre_archivo, peso, anonimo, fecha, estado, id_usuario) values(
						'".$_POST['tipo_solicitud']."',
						'".$_POST['asunto']."',
						'".$_POST['mensaje']."',
						'$nombreFinal',
						'$nombre',
						'$peso',
						'".$_POST['anonimo']."',
						'$fecha',
						'activo',
						'".$_POST['id_usuario']."'
						)")or die($conexion->error);
						header("location: ../admin/index.php");
				}
			}else{
				echo "formato de archivo no permitido";
			}
		}else{
			$conexion->query("insert into pqrs (tipo_solicitud, asunto, mensaje, ruta, anonimo, fecha, estado, id_usuario) values(
						'".$_POST['tipo_solicitud']."',
						'".$_POST['asunto']."',
						'".$_POST['mensaje']."',
						'default.jpg',
						'".$_POST['anonimo']."',
						'$fecha',
						'activo',
						'".$_POST['id_usuario']."'
						)")or die($conexion->error);
						header("location: ../admin/index.php");
		}
}else if ($_POST['anonimo'] == "si") {
	$fecha = date('y-m-d', $time);
		if ($_FILES['imagen']['name']!='') {
			$carpeta="../admin/archivos/";
			$nombre = $_FILES['imagen']['name'];
			$peso = (round((($_FILES['imagen']['size']/1024)*10)))/10;
			$temp=explode('.',$nombre);
			$extension= end($temp);
			$nombreFinal = time().'.'.$extension;

			if ($extension=='jpg' || $extension=='png' || $extension=='JPG' || $extension=='PNG' || $extension=='pdf' || $extension=='docx.pdf' || $extension=='docx' || $extension=='gif' || $extension=='xlsx' || $extension=='pptx' || $extension=='wav' || $extension=='mp3' || $extension=='mp4' || $extension=='mov' || $extension=='avi' || $extension=='zip' || $extension=='rar' || $extension=='txt') {
				if (move_uploaded_file($_FILES['imagen']['tmp_name'], $carpeta.$nombreFinal)) {

					$conexion->query("insert into pqrs (tipo_solicitud, asunto, mensaje, ruta, nombre_archivo, peso, anonimo, fecha, estado) values(
						'".$_POST['tipo_solicitud']."',
						'".$_POST['asunto']."',
						'".$_POST['mensaje']."',
						'$nombreFinal',
						'$nombre',
						'$peso',
						'".$_POST['anonimo']."',
						'$fecha',
						'anonimo'
						)")or die($conexion->error);
						header("location: ../admin/index.php");
				}
			}else{
				echo "formato de archivo no permitido";
			}
		}else{
			$conexion->query("insert into pqrs (tipo_solicitud, asunto, mensaje, ruta, anonimo, fecha, estado) values(
						'".$_POST['tipo_solicitud']."',
						'".$_POST['asunto']."',
						'".$_POST['mensaje']."',
						'default.jpg',
						'".$_POST['anonimo']."',
						'$fecha',
						'activo'
						)")or die($conexion->error);
						header("location: ../admin/index.php");
		}
	
}else{
	header("location: ../admin/index.php?ocurrio un error");
}
	
?>