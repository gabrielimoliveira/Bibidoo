<?php
require 'conexao.php';
require 'model/class/Usuario.class.php';
if(!empty($_POST['login']) && !empty($_POST['pswd'])){
        $login=$_POST['login'];
        $senha = md5($_POST['pswd']);
        $usuario = new Usuario();
        $usuario->setLogin($login);
        $usuario->setSenha($senha);
        $val=VerificaUsuario($msqli);
        if($val){
            header('Location: entrar.php');
        }else{
            echo "Login ou senha incorretos";
    }
}else{
    echo "mundo";
}
 ?>