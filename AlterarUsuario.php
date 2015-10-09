<?php

session_start();
require 'conexao.php';
require 'class/Usuario.class.php';


	$usuario= new Usuario ($_SESSION['usuario'],null,null,null,null,null,null);
	$usuario->GetUsuario($mysqli);
	?>
	<form name="alterar" action="altera_infousuario.php" method="POST">
	Nome: <input type="text" name="nome" value=<?php echo $usuario->getNome();?>><br>
	Sobrenome:<input type="text" name="sobrenome" value=<?php  echo $usuario->getSobrenome();?>><br>
	Login:<input type="text" name="login"value=<?php echo $usuario->getLogin();?>><br>
	Senha: <input type="text" name="senha" value=<?php echo $usuario->getSenha();?>><br>
	Nascimento :<input type="text" name="data" value=<?php  echo $usuario->getNascimento();?>><br>
	<input type="submit" name="Enviar" value="Enviar">
	</form>
<?php
if(!empty($_POST["Enviar"])){
$nome=$_POST['nome'];
$sobrenome=$_POST['sobrenome'];
$login=$_POST['login'];
$senha=$_POST['senha'];
$nascimento=$_POST['nascimento'];
$usuario =new Usuario ($_SESSION['usuario'],$nome,$sobrenome,$login,$senha,$nascimento);
$usuario->AlteraUsuario($mysqli);
header("Location:lista_carro.php");
}
?>