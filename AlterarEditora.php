<?php
session_start();
require 'conexao.php';
require 'class/Editora.class.php';

if(!empty($_GET['idEditora'])){
	$idEditora=$_GET['idEditora'];
	$_SESSION['idEditora']=$idEditora;
	$editoraG= new Editora ($_GET['idEditora'],null,null);
	$editoraG->GetEditora($mysqli);
	?>
	<form name="alterar" action="AlterarEditora.php" method="POST">
	Nome: <input type="text" name="nome" value=<?php echo $editoraG->getNome();?>><br>
	<input type="submit" name="Enviar" value="Enviar">
	</form>
<!-- fica normal os gets quando é herança????? -->
<?php
}
if(!empty($_POST["Enviar"])){
$name=$_POST["nome"];
$editoraUpdate =new Autor ($_SESSION['idEditora'],$name);
$editoraUpdate->AlterarEditora($mysqli);
//header("Location:listaEditora.php");
}
?>
