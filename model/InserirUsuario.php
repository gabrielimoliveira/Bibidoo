<?php
require 'class/Usuario.class.php';
require '../conexao.php';
						$nome=$_POST['nome'];
						$nomeusuario=$_POST['usuario'];
						$email=$_POST['email'];
                                                $val=$_POST['senha'];
						$senha=md5($val);
						$nascimento=$_POST['datanascimento'];
            if(!empty($_FILES['foto'])){
                $foto=$_FILES['foto'];
                if (!empty($foto["name"])) {
                    $largura = 8000; // Largura máxima em pixels
                    $altura = 8000; // Altura máxima em pixels
                    $tamanho = 8150000; // Tamanho máximo do arquivo em bytes
                     // Verifica se o arquivo é uma imagem
                    if(!preg_match("/(jpeg|png|gif|bmp)/", $foto["type"])){
                       $error[] = "Isso não é uma imagem.";
                    } 
                    $dimensoes = getimagesize($foto["tmp_name"]); // Pega as dimensões da imagem
                    // Verifica se a largura da imagem é maior que a largura permitida
                    if($dimensoes[0] > $largura) {
                      $error[] = "A largura da imagem não deve ultrapassar ".$largura." pixels";
                    }
                    // Verifica se a altura da imagem é maior que a altura permitida
                    if($dimensoes[1] > $altura) {
                      $error[] = "Altura da imagem não deve ultrapassar ".$altura." pixels";
                    }
                    // Verifica se o tamanho da imagem é maior que o tamanho permitido
                    if($foto["size"] > $tamanho) {
                      $error[] = "A imagem deve ter no máximo ".$tamanho." bytes";
                    }
                    // Se não houver nenhum erro
                    if (empty($error)) {
                    // Pega extensão da imagem
                      preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);
                    // Gera um nome único para a imagem
                      $nome_imagem = md5(uniqid(time())) . "." . $ext[1];
                    // Caminho de onde ficará a imagem
                      $caminho_imagem = "../img/foto/" . $nome_imagem;
                    // Faz o upload da imagem para seu respectivo caminho
                    move_uploaded_file($foto["tmp_name"], $caminho_imagem);

                    }
                    // Se houver mensagens de erro, exibe-as
                    if (!empty($error)){
                      foreach ($error as $erro){
                      }
                    }  
                }else{
                    $nome_imagem=null;
		}
	
            }else{
                $foto= "";
                $nome_imagem= "null";
            }
            $_tipo="2";
     					$usuario = new Usuario(null,$nome,$nomeusuario,$email,$senha,$nascimento,$_tipo,$nome_imagem);
						$valor= $usuario ->InserirUsuario($mysqli);
                                               echo $valor;
?>