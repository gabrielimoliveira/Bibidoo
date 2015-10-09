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
	public function __construct($_id=null,$_titulo=null,$_numpage=null,$_sinopse=null,$_leitores=null,$_categoria=null){
		$this->id=$_id;
		$this->titulo=$_titulo;
		$this->numpage=$_numpage;
		$this->sinopse=$_sinopse;
		$this->leitores=$_leitores;
		$this->categoria=$_categoria;
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
    while ($linha = $resultado->fetch_array())
    {
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
		$query= "insert into Livro Values" . "(NULL,' $this->titulo ', '$this->numpage ',' $this->sinopse ',' $this->leitores',' $this->categoria ')";
		$mysqli->query($query);
		if($mysqli->affected_rows==1){
			echo "Livro cadastrado com sucesso";
		}else{
			echo "Erro livro nao cadastrado: $mysqli->error";
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
	public function processafoto($foto,$mysqli){
		if (!empty($foto["name"])) {
      $largura = 3000; // Largura máxima em pixels
      $altura = 4000; // Altura máxima em pixels
      $tamanho = 150000; // Tamanho máximo do arquivo em bytes
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
      $caminho_imagem = "foto/" . $nome_imagem;
    // Faz o upload da imagem para seu respectivo caminho
    move_uploaded_file($foto["tmp_name"], $caminho_imagem);
    
    }
    $query= "insert into Imagens Values" . "(NULL,' $nome_imagem','$this->id')";
		$mysqli->query($query);
    // Se houver mensagens de erro, exibe-as
    if (!empty($error)){
      foreach ($error as $erro){
       echo $erro . "<br/>";
      }
    }
    }    
    
}
}
?>