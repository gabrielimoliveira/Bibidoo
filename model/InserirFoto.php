<?php
require_once 'class/Livro.class.php';
	$Foto= new Livro();
	$Foto->mostra_form_foto();

if(!empty($_POST['Enviar'])){
	$idLivro=$_SESSION['idlivro'];
	$Foto= new Livro($idLivro);
	$imagem=$_FILES['foto'];
	$Foto->processafoto($imagem,$mysqli);
}
?>