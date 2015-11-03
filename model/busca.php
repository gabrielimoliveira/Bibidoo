<?php
require 'conexao.php';
require 'class/Usuario.class.php';
$_nome=$_POST['palavra'];
$usuario= new Usuario();
$usuario->setNome($_nome);
$id=$usuario->getId();
echo "<a href=\"perfil.php?id=".$id."\">$_nome</a>";
 ?>