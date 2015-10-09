<?php
session_start();
require 'conexao.php';
require 'class/Pessoa.class.php';
if(!empty($_GET['idAutor'])){
	$idAutor=$_GET['idAutor'];
	$_SESSION['idAutor']=$idAutor;
	$autorG= new Autor ($_GET['idAutor'],null,null);
	$autorG->GetAutor($mysqli);
	$autorG->mostra_formulario($autorG);
	?>
	
<!-- fica normal os gets quando é herança????? -->
<?php
}
if(!empty($_POST["Enviar"])){
$name=$_POST["nome"];
$lastname=$_POST["sobrenome"];
$autorUpdate =new Autor ($_SESSION['idAutor'],$name,$lastname);
$autorUpdate->AlterarAutor($mysqli);
//header("Location:listaAutor.php");
}
?>

