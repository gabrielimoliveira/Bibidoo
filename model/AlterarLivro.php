<?php
session_start();
require_once  "conexao.php";
require 'class/Livro.class.php';
if(!empty($_GET['idLivro'])){
	$idLivro=$_GET['idLivro'];
	$_SESSION['idLivro']=$idLivro;
	$Livro= new Livro ($_GET['idLivro']);
	$Livro->GetLivro($mysqli);
	$Livro->mostraformularioaltera($Livro,$mysqli);
	?>
<!-- fica normal os gets quando é herança????? -->
<?php
}
if(!empty($_POST["Enviar"])){
	$titulo= $_POST['titulo'];
	$numpage = $_POST['numpage'];
	$sinopse = $_POST['sinopse'];
	$categoria = $_POST['categoria'];
	$leitores=0;
	$LivroUpdate =new Livro($_SESSION['idLivro'],$titulo,$numpage,$sinopse,$leitores,$categoria);
$id=$_SESSION['idLivro'];
$LivroUpdate->AlterarLivro($mysqli,$id);
//header("Location:listaAutor.php");
}
?>

