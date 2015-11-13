<?php
require '../conexao.php';
include_once('../model/class/Livro.class.php');
 if(!empty($_POST['cadastrar'])){
     $cat=$_POST['categoria'];
     $livro = new Livro();
     $livro ->setCategoria($cat);
    $livro ->InserirCategoria($mysqli);
 }
 
?>


