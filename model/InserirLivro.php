<?php
require './conexao.php';
require 'class/Livro.class.php';
					if(!empty($_POST['cadastroLivro'])&&(!empty($_POST['titulo'])) && (!empty($_POST['numpage']))  && (!empty($_POST['sinopse']))&& (!empty($_POST['categoria']))){
						$titulo= $_POST['titulo'];
						$numpage = $_POST['numpage'];
						$sinopse = $_POST['sinopse'];
						$categoria = $_POST['categoria'];
						$leitores=0;
						$Livro = new Livro(null,$titulo,$numpage,$sinopse,$leitores,$categoria);
						$Livro ->IncluirLivro($mysqli);
					
					}

					$Livro = new Livro();
					//$Livro ->select_categoria($mysqli);



					
?>