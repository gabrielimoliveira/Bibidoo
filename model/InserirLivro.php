<?php
require '../conexao.php';
require 'class/Livro.class.php';
                                                $titulo= $_POST['titulo'];
						$numpage = $_POST['numpage'];
						$sinopse = $_POST['sinopse'];
						$categoria = $_POST['categoria'];
						$leitores=$_POST['leitores'];  
                                                $ano=$_POST['ano'];
                                               if (!empty($_FILES['LIVRO'])) {
                                                $foto=$_FILES['LIVRO'];
                                                }else{
                                                    echo "NÃO EXISTE FOTO";
                                                }
                                              //  $fotocerto=  processafoto($foto);
                                                //echo $fotocerto;
						//$Livro = new Livro(null,$titulo,$numpage,$sinopse,$leitores,$categoria,null,$ano);
                                             // $val =$Livro ->IncluirLivro($mysqli);
                                              //echo $val;			
					
?>