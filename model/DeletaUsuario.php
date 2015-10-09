<?php
require_once  "conexao.php";
require 'class/Usuario.class.php';
	if(!empty($_GET['Usuario'])){
		$usuario= new Usuario ($_GET['Usuario']);
		$usuario->DeletaLivro($mysqli);
	}
?>