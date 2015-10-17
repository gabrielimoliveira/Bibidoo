<?php
require 'conexao.php';
include_once 'model/class/Usuario.class.php';
if(!empty($_POST['Entrar'])&& !empty($_POST['login']) && !empty($_POST['pswd'])){
        $login=$_POST['login'];
        $senha = md5($_POST['pswd']);
        $usuario = new Usuario();
        $usuario->setLogin($login);
        $usuario->setSenha($senha);
        if(VerificaUsuario($msqli)){
            header('Location: entrar.php');
        }else{
            echo "Login ou senha incorretos";
    }
}else{
    echo "mundo";
}
 ?>