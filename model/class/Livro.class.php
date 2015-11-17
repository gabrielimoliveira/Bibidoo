<?php
Class Livro{
	private $id;
	private $titulo;
	private $numpage;
	private $sinopse;
	private $leitores;
	private $categoria;
	private $foto;
	private $tipo;//da tabela Usuario_has_livro
	private $data;//da tabela Usuario_has_livro
	private $idimagem;
        private $ano;
        public function __construct($_id=null,$_titulo=null,$_numpage=null,$_sinopse=null,$_leitores=null,$_categoria=null,$_foto=null,$_ano=null){
		$this->id=$_id;
		$this->titulo=$_titulo;
		$this->numpage=$_numpage;
		$this->sinopse=$_sinopse;
		$this->leitores=$_leitores;
		$this->categoria=$_categoria;
                $this->foto=$_foto;
                 $this->ano=$_ano;
	}
	public function getTitulo(){
		return $this->titulo;
	}
	public function setTitulo($_titulo){
		$this->titulo=$_titulo;
	}
	public function getNumpage(){
		return $this->numpage;
	}
	public function setNumpage($_numpage){
		$this->numpage=$_numpage;
	}
	public function getSinopse(){
		return $this->sinopse;
	}
	public function setSinopse($_sinopse){
		$this->sinopse=$_sinopse;
	}
	public function getLeitores(){
		return $this->leitores;
	}
	public function setLeitores($_leitores){
		$this->leitores=$_leitores;
	}
	public function getCategoria(){
		return $this->categoria;
		$_SESSION['CAT']= $this->categoria;
	}
	public function setCategoria($_categoria){
		$this->categoria=$_categoria;
	}
	//Funções para a tabela foto
	public function getFoto(){
		return $this->foto;
	}
	public function setFoto($_foto){
		$this->foto=$_foto;
	}
	public function getidImagem(){
		return $this->idimagem;
	}
	public function setidImagem($_idimagem){
		$this->idimagem=$_idimagem;
	}
	/*public function getForenImagem(){
		return $this->forenimagem;
	}
	public function setForenImagem($_foren){
		$this->forenimagem=$_foren;
	}*/
	//Acaba as funções aqui
		public function getTipo(){
		return $this->tipo;
	}
	public function setTipo($_tipo){
		$this->tipo=$_tipo;
	}
		public function getData(){
		return $this->data;
	}
	public function setData($_data){
		$this->data=$_data;
	}
        public function getAno(){
            return $this->ano;
        }
        public function setAno($_ano){
            $this->ano=$_ano;
        }
                function InserirCategoria($mysqli){
      $query="Insert into categoria Values" . "(NULL,'$this->categoria')";
      $mysqli->query($query);
      if($mysqli->affected_rows==1){
          echo "categoria cadastrada com sucesso";
      }  else {
           echo "categoria não cadastrada";
      }
      
  }
	public function ListaLivro($mysqli){

		$query= "Select * from Livro";
		$resultado = $mysqli->query($query);
		echo "<table border=\"3\">
				<th>titulo</th>
				<th>Numero de pagina</th>
				<th>Sinopse</th>
				<th>Leitores</th>
				<th>Excluir</th>
				<th>Alterar Informações</th>
				<th>Adicionar ou remover fotos</th>";
		while($linha = $resultado->fetch_array()){

			echo "<tr><td>" . $linha['titulo'] . "</td><td>  " . $linha ['numpage'] . "</td> <td> ". $linha['sinopse'] . "<td>" . $linha['leitores'] . "</td>" . "</td><td><a href=\"DeletaLivro.php?idLivro=" . $linha['idLivro'] . "\"><img src=\"lixeira.png\"></a></td><td><a href=\"AlterarLivro.php?idLivro=" . $linha['idLivro'] . "\"><img src=\"alterar.png\"></a></td><td><a href=\"ListarFoto.php?idLivro=" . $linha['idLivro'] . "\"><img src=\"foto.png\"></a></td></tr><br>" ;

		}
		echo "</table>";
	}
	public function mostra_foto($imagem,$mysqli){
		$query ="Select * from Imagens where Livro_idLivro='$imagem'";
		$resultado = $mysqli->query($query);
		while($linha = $resultado->fetch_array()){
			echo "<img src=\"../foto/". $linha['foto'] . "\"/></br>";
		}

	}
	public function GetLivro($mysqli){
		$query="Select * from Livro Where idLivro=".$this->id;
		$resultado=$mysqli->query($query);
		$linha=$resultado->fetch_array();

		$this->titulo=$linha['titulo'];
		$this->numpage=$linha['numpage'];
		$this->sinopse=$linha['sinopse'];
		$this->leitores=$linha['leitores'];
		//$this->categoria=$linha['categoria'];
	}
	public function select_categoria($mysqli)
 {  
            
    $query = "Select * from categoria";
	$resultado =$mysqli->query($query);
       echo "Categoria:<SELECT name=categoria>";
        /* @var $resultado type */
        while($linha = $resultado->fetch_array()){
           echo "<OPTION VALUE=\"" . $linha['idCategoria'] . "\"> " . $linha['nome'] . "  </OPTION>";
        }
	echo "</SELECT><br>";
  }
  	public function select_categoria_altera($mysqli,$Livro)
 {
    $query = "Select * from categoria";
	$resultado =$mysqli->query($query);

    echo "Categoria:<SELECT name=categoria>";
    while ($linha = $resultado->fetch_array())
    {	
    	if($linha['idCategoria']== $Livro->getCategoria()){
       		echo "<OPTION selected=\"selected\" VALUE=\"" . $linha['idCategoria'] . "\"> " . $linha['nome'] . "  </OPTION>";
   		}else{
   			echo "<OPTION VALUE=\"" . $linha['idCategoria'] . "\"> " . $linha['nome'] . "  </OPTION>";
   		}
    }	
	echo "</SELECT><br>";
  }
	public function IncluirLivro($mysqli){
		$query= "insert into Livro Values" . "(NULL,'$this->titulo',$this->numpage,'$this->sinopse',$this->leitores,'$this->ano')";
		$mysqli->query($query);
		if($mysqli->affected_rows==1){
                    $query1 = "SELECT LAST_INSERT_ID() AS 'idLivro'";
                    $resultado= $mysqli->query($query1);
                    $linha=$resultado->fetch_array();
                    $idLivro=$linha['idLivro'];
                    $sql= "INSERT into livroca Values" . "($idLivro,$this->categoria)";
                    $mysqli->query($sql);
			return "Livro cadastrado com sucesso";
		}else{
			return "Erro livro nao cadastrado:" .$mysqli->error;
		}
                
	}
	function mostraformulario($Livro,$mysqli){

		?>
		<form name="incluir" action="InserirLivro.php" method="POST" enctype="multipart/form-data">
			Titulo: <input type="text" name="titulo" value=""/><br>
			<?php $Livro->select_categoria($mysqli);?>
			Numero de Paginas :<input type="text" name="numpage" value=""/><br>
			Sinopse: <input type="textarea" name="sinopse" value=""/><br>
			 <input type="submit" name="Enviar" value="Enviar"/><br>
		</form>
		<?php
	}
	public function ConsultarLivro($mysqli){
		$query = "Select * from Livro where marca LIKE '%$this->titulo%' ";
		 $resultado = $mysqli->query($query);
		 if($mysqli->affected_rows>=1){
			while($linha = $resultado->fetch_array()){
				echo "Livro:" . $linha['titulo'] . "</br>";

			}
		}else{
			echo "Não existe o livro com esse titulo";
		}

	}
	public function mostraformularioaltera($Livro,$mysqli )
	{
		?>
			<form name="alterar" action="AlterarLivro.php" method="POST">
				Titulo: <input type="text" name="titulo" value=<?php echo $Livro->getTitulo();?>><br>
				<?php $Livro->select_categoria_altera($mysqli,$Livro);?>
				Numero de Paginas :<input type="text" name="numpage" value=<?php echo $Livro->getNumpage();?>><br>
				Sinopse: <input type="textarea" name="sinopse" value=<?php echo $Livro->getSinopse();?>><br>
				<input type="submit" name="Enviar" value="Enviar">
			</form>
		<?php
	}
	public function AlterarLivro($mysqli,$id){
		$query = "update Livro set titulo= '$this->titulo' ,  numpage=' $this->numpage ', sinopse = ' $this->sinopse ', leitores =  $this->leitores  where idLivro = '$id'"; 
		$mysqli->query($query);
		if($mysqli->affected_rows==1){
			echo "Livro alterado com sucesso";
		}else{
			echo "Erro : $mysqli->error";
		}

	}
	public function DeletaLivro($mysqli){
		$query = "delete from Livro where idLivro like '$this->id'";
		$mysqli->query($query);
		if($mysqli->affected_rows==1){
			echo "Livros deletado com sucesso";
		}else{
			echo "Erro : $mysqli->error";
		}
	}
	public function mostra_form_foto(){
		?>
		<form name="incluirfoto" action="InserirFoto.php" method="POST" enctype="multipart/form-data">
		Foto:<input type="file" name="foto"/></br>
			 <input type="submit" name="Enviar" value="Enviar"/><br>
		</form>

		<?php
	}
}
?>