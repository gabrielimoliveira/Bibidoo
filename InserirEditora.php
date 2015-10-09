<?php
require 'conexao.php';
require 'class/Editora.class.php';

if(!empty($_POST["Enviar"])){
$name=$_POST["nome"];
$Editora= new Editora (null,$name);
$Editora->inserirEditora($mysqli);
}
$Editora= new Editora ();
$Editora->mostraformulario();
?>
