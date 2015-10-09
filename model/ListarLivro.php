<?php
require 'conexao.php';
require 'class/Livro.class.php';
$Livro = new Livro();
?>
<div id="tabela">
<?php
$Livro->ListaLivro($mysqli);
?>
</div>