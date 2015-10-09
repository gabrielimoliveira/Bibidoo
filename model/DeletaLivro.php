<?php
require_once  "conexao.php";
require 'class/Livro.class.php';
	if(!empty($_GET['idLivro'])){
		$Livro= new Livro($_GET['idLivro']);
		$Livro->DeletaLivro($mysqli);
	}
?>