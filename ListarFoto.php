<?php
	require_once './conexao.php';
	require_once 'class/Livro.class.php';
	include_once'InserirFoto.php';
	session_start();
	if(!empty($_GET['idLivro'])){
		$_SESSION['idlivro']=$_GET['idLivro'];

	}
	$Foto= new Livro();
	$imagem=$_SESSION['idLivro'];
	$Foto->mostra_foto($imagem,$mysqli);
?>