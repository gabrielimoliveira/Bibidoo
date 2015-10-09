<!--autor -->
<?php
require_once ('Pessoa.class.php');
	class Autor extends Pessoa {

		private $idAutor;
	
	function __construct($_id=null,$_nome=null,$_sobrenome=null){
 		parent::__construct($_nome,$_sobrenome);
		$this->idAutor=$_id;
 	}
 	//get
 	function getIdAutor(){
		return $this->idAutor;
	}
 	//inicio do inserir
 	public function InserirAutor($mysqli){
 			$query="insert into autor Values ". "(NULL,' $this->nome ', '$this->sobrenome')";
			$mysqli->query($query);//manda para o banco
			if ($mysqli->affected_rows ==1) {
				echo "Autor cadastrado com sucesso!";
			}else{
				echo "Erro: $mysqli->error";
		}
	
	} //fim do  inserir

	 //inicio do get

	public function GetAutor($mysqli){
		$query="Select * from Autor Where idAutor=".$this->idAutor;
		$resultado=$mysqli->query($query);
		$linha=$resultado->fetch_array();
		$this->nome=$linha['nome'];
		$this->sobrenome=$linha['sobrenome'];
	} //fim do get
	//inicio do alterar
	public function AlterarAutor($mysqli){
		// "Update tabela set atributo = x where id=x"
		$query="Update Autor set nome='$this->nome',sobrenome='$this->sobrenome',
		             where idAutor=$this->idAutor"; 
		if($mysqli->query($query)){
			echo "Autor alterado com sucesso!!";
		}else{
			echo "	Erro:".$mysqli->error;
		}
	} // fim do altera

	//inicio do Excluir
	public function DeletarAutor($mysqli){
		$query="delete from Autor where idAutor=$this->idAutor";
		$mysqli->query($query);
	}  //fim do excluir
	public function ConsultaAutor($mysqli){
		$query = "Select * from Autor where marca LIKE '%$this->nome%' ";
		 $resultado = $mysqli->query($query);
		 if($mysqli->affected_rows>=1){
			while($linha = $resultado->fetch_array()){
				echo $linha['nome'] . "</br>";

			}
		}else{
			echo "Não existe autor com esse nome";
		}

	}
	public function mostra_formulario($autorG)
	{
		?>
		<form name="alterar" action="AlterarAutor.php" method="POST">
			Nome: <input type="text" name="nome" value=<?php echo $autorG->getNome();?>><br>
			Sobrenome:<input type="text" name="sobrenome" value=<?php  echo $autorG->getSobrenome();?>><br> 
			<input type="submit" name="Enviar" value="Enviar">
			</form>
		<?php
	}

	}
?>