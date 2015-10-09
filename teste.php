<?php
echo "<td><a href='teste.php?cod=" . $linha['cod'] .
"&id=".$linha['Usuario_idUsuario'] . "'>Editar Post</a. </td>";
			echo "<td><a href='excluir_post.php?cod=" . $linha['cod'] .
			"&id=".$linha['Usuario_idUsuario'] . "'>Excluir Post </a></td>";
			?>