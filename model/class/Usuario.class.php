<?php
require_once ('Pessoa.class.php');
session_start();
 	class Usuario extends Pessoa{
 		private $id;
 		private $login;
 		private $senha;
 		private $foto;
 		private $amigos;

 		function __construct($_id=null,$_nome=null,$_sobrenome=null,$_login=null,$_senha=null,$_nascimento=null,$_foto=null,$_foto=null){
 			parent::__construct($_nome,$_sobrenome,$_nascimento);
 			$this->foto=$_foto;
 			$this->login=$_login;
 			$this->senha=$_senha;
 			$this->foto=$_foto;
 			$this->id=$_id;
 		}
 		function getId(){
 			return $this->id;
 		}
 		function getAmigos(){
 			return $this->amigos;
 		}
 		function setAmigos(){
 			//$this->amigos[] = $username;
 		}
 		
 		function getLogin(){
 			return $this->login;
 		}
 		function setLogin($_login){
 		 $this->login=$_login;
 		}
 		function getSenha(){
 			return $this->senha;
 		}
 		function setSenha($_senha){
 			return $this->senha=$_senha;
 		}
 		function getfoto(){
 			return $this->foto;
 		}
 		function setFoto($_foto){
 			 $this->foto=$_foto;
 		}
 		function InserirUsuario($mysqli){
 			$query= "insert into Usuario Values" . "(NULL,' $this->nome ',' $this->sobrenome',' $this->login ',' $this->senha ',' null ',' $this->foto',' $this->nascimento')";
		$mysqli->query($query);
		if($mysqli->affected_rows==1){
			echo "usuario cadastrado com sucesso";
		}else{
			echo "Erro : $mysqli->error";
		}

 		}
 		public function AlterarUsuario($mysqli){
		$query = "update Usuario set " . "nome= ' $this->nome ', sobrenome =' $this->sobrenome ', cor = ' $this->login ', cor = ' $this->senha ', cor = ' $this->nascimento ' '" .  "where idUsuario = $this->idUsuario"; 
		$mysqli->query($query);
		if($mysqli->affected_rows==1){
			echo "usuario



			 alterado com sucesso";
		}else{
			echo "Erro : $mysqli->error";
		}

	}
 		 function mostraformulario(){

		?>
		 <form method="post" action="../InserirUsuario.php" id="formulario">
                        <input type="text" title="Preencha o campo nome." required name="nome" id="nome" class="nome" placeholder="Nome Completo" />
                        <input type="text" title="Preencha o campo usuário" required name="usuario" id="usuario" placeholder="Usuário" >
                         <input type="email" title="Preencha o campo email." required name="email" id="email" placeholder="Email"/>
                         <input type="password" title="Preencha o campo senha."required name="senha" id="senha" placeholder="Senha"/>
                        <input type="password" title="Preencha o campo senha."required name="senha" id="senha" placeholder="Senha"/>
                        <input type="date" title="Preencha o campo data nascimento." required name="datanascimento" id="datanascimento" placeholder="data nascimento">
                                <input type="submit" value="Cadastrar" name="cadastro" id="botaocadastro" class="cad" />
                                <div id="entre">
                                    <p>Ja possui cadastro?<a href="#entrar" class="link">Login</a></p>
                                </div>
                        </form>
		<?php
	}
	function GetUsuario($mysqli){
		$query="Select * from Usuario Where idUsuario=".$this->idUsuario;
		$resultado=$mysqli->query($query);
		$linha=$resultado->fetch_array();
		$this->nome=$linha['nome'];
		$this->login=$linha['login'];
		$this->senha=$linha['senha'];
		$this->nascimento=$linha['nascimento'];
		$this->sobrenome=$linha['sobrenome'];
	}
	function DeletarUsuario($mysqli){
		$query = "delete from Usuario where idUsuario like '$this->id'";
		$mysqli->query($query);
		if($mysqli->affected_rows==1){
			echo "Usuario deletado com sucesso";
		}else{
			echo "Erro : $mysqli->error";
		}
		//header('location:index.php');
	}
	public function ConsultaUsuario($mysqli){
		$query = "Select * from Usuario where marca LIKE '%$this->nome%' ";
		 $resultado = $mysqli->query($query);
		 if($mysqli->affected_rows>=1){
			while($linha = $resultado->fetch_array()){
				echo $linha['titulo'] . "</br>";

			}
		}else{
			echo "Não existe usuario com esse nome";
		}

	}
}
?>
