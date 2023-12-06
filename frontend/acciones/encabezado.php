<?php
	session_start();

	if(!isset ($_SESSION['id'])){
		header("location: index.php");

	}

	$nombre = $_SESSION['nombre'];
	$tipo_usuario = $_SESSION['tipo_usuario'];


?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Sistema Servirefri</title>
	
	<link rel="stylesheet" href="./css/fontawesome-all.min.css">
	<link rel="stylesheet" href="./css/2.css">
	<link rel="stylesheet" href="./css/estilo.css">
</head>
<body>
	<div class="container">
		<div class="row">