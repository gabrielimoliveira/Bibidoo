<?php
require_once  "conexao.php";
require_once  'class/Editora.class.php';
session_start();

	$editora= new Editora ($_GET['idAutor'],NULL);
	$editora->DeletarEditora($mysqli);
	// header("Location:lista_carro.php");
?>