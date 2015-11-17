<?php
session_start();
require 'conexao.php';
require 'model/class/Usuario.class.php';
if(!empty($_POST['login']) && !empty($_POST['pswd'])){
        $login=$_POST['login'];
        $senha = md5($_POST['pswd']);
        $usuario = new Usuario();
        $usuario->setLogin($login);
        $usuario->setNomeUsuario($login);
        $usuario->setSenha($senha);
        $usuario->setTipo("2");
        if($usuario->VerificaUsuario($mysqli)){
            $_SESSION['usuario']=$usuario->getNomeUsuario();
            header('location: entrar.php');
        }else{
            $usuario->setLogin($login);
            $usuario->setSenha($senha);
            $usuario->setTipo("1");
            if($usuario->VerificaAdm($mysqli)){
               echo"adm";
            }else{
                 echo "Login ou senha incorretos";
            }
        }
}else{
    echo "mundo";
}
 ?>