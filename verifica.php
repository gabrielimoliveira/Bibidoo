<?php
require 'conexao.php';
require 'model/class/Usuario.class.php';
if(!empty($_POST['login']) && !empty($_POST['pswd'])){
        $login=$_POST['login'];
        $senha = md5($_POST['pswd']);
        $usuario = new Usuario();
        $usuario->setLogin($login);
        $usuario->setSenha($senha);
        if($usuario->VerificaUsuario($mysqli)){
            $_SESSION['usuario']=$usuario->getNomeUsuario();
        }else{
            echo "Login ou senha incorretos";
    }
}else{
    echo "mundo";
}
 ?>