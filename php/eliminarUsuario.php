<?php 
include "./conexion.php";

$conexion->query("delete from usuario where id=".$_POST['id']);
echo 'listo';
?>