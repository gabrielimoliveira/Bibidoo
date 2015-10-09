<?php
 
 class Editora {

 	private $idEditora;
 	private $nome;
	function __construct($idEd=null,$_nome=null){
		$this->idEditora = $idEd;
		$this->nome=$_nome;
	}
	function getIdEditora(){
		return $this->idEditora;
	}
	function getNome(){
		return $this->nome;
	}
	function setNome($_nome){
		$this->nome=$_nome;
	}
	public function mostraformulario(){
		?>
		<form name="inserir" action="inserirEditora.php" method="POST">
			Nome: <input type="text" name="nome" value=""><br>
			<input type="submit" name="Enviar" value="Enviar">
		</form>
		<?php

	}
	//inserirEditora
	public function inserirEditora($mysqli){
		$query="INSERT INTO Editora VALUES". "(NULL,'$this->nome')";
			$mysqli->query($query);//manda para o banco
			if ($mysqli->affected_rows ==1) {
				echo "Editora cadastrado com sucesso!";
			}else{
				echo "Erro: $mysqli->error";
		}
	
	} //fim do  inserir

	//inicio do get
	public function GetEditora($mysqli){
		$query="Select * from Editora Where idEditora=".$this->idEditora;
		$resultado=$mysqli->query($query);
		$linha=$resultado->fetch_array();
		$this->nome=$linha['nome'];
	} //fim do get

	//inicio do alterar
	public function AlterarEditora($mysqli){
		// "Update tabela set atributo = x where id=x"
		$query="Update Editora set nome='$this->nome' where idEditora=$this->idEditora"; 
		if($mysqli->query($query)){
			echo "Editora alterada com sucesso!!";
		}else{
			echo "	Erro:".$mysqli->error;
		}
	} // fim do altera

	//inicio do Excluir
	public function DeletarEditora($mysqli){
		$query="delete from Editora where idEditora=$this->idEditora";
		$mysqli->query($query);
	}  //fim do excluir

	public function ConsultaEditora($mysqli){
		$query = "Select * from Usuario where marca LIKE '%$this->nome%' ";
		 $resultado = $mysqli->query($query);
		 if($mysqli->affected_rows>=1){
			while($linha = $resultado->fetch_array()){
				echo $linha['nome'] . "</br>";

			}
		}else{
			echo "Não existe editora com esse nome";
		}

	}


 }



?>