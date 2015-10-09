
<?php
require_once  "conexao.php";
require 'class/autor.class.php';
	if(!empty($_GET['idAutor'])){
		$Autor= new Autor($_GET['idAutor'],null,null);
		$Autor->DeletarAutor($mysqli);
	}
?>