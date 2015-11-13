<?php
include_once('../model/class/Livro.class.php');
 if(!empty($_POST['cadastrar'])){
     $cat=$_POST['cadastrar'];
     $ob= new Livro();
     if($ob->inseri_categoria($cat,$mysqli)){
         echo "categoria cadastrada com sucesso";
     }else{
         echo "categoria não cadastrada";
     }
 }
?>

