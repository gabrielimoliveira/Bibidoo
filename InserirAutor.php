<?php
require 'conexao.php';
require 'class/autor.class.php';

if(!empty($_POST["Enviar"])){
$name=$_POST["nome"];
$lastname=$_POST["sobrenome"];
$autor= new Autor (null,$name,$lastname);
$autor->InserirAutor($mysqli);
}
?>
<form name="inserir" action="InserirAutor.php" method="POST">
	Nome: <input type="text" name="nome" value=""><br>
	Sobrenome:<input type="text" name="sobrenome" value=""><br>
	<input type="submit" name="Enviar" value="Enviar">
	</form>
<?php