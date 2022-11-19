<?php 
session_start();
include 'conexion.php';
$password = "";
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
header("location: ../login.php");
?>