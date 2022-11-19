<?php 
session_start();
unset($_SESSION['datos_login']);
header("location: ../index.php");
?>