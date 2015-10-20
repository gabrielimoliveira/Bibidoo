<?php
$idLivros=$_GET["idLivro"];

include("conexao.php");

$query="SELECT * FROM Livros WHERE idLivros = $idLivros";

$resultado = $mysqli->query($query);

echo "<table border='1'>
      <tr>
       <th>Nome</th>
       <th>Autor</th>
      </tr>";

while($linha = $resultado->fetch_array())
  {
  echo "<tr>";
  echo "<td>" . $linha['Nome'] . "</td>";
  echo "<td>" . $linha['Autor'] . "</td>";
  echo "</tr>";
  }
echo "</table>";
?>
