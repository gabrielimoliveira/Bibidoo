<?php
/* verifica nome de usuário/email ou senha */
if(!empty($_POST['Entrar'])&& !empty($_POST['login']) && !empty($_POST['pswd'])){
        $login=$_POST['login'];
        $pswd = $_POST['pswd'];
        echo $login;
    }else{
        echo "Informações inválidas!";
    }
?>