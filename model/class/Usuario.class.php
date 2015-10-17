<?php
require_once ('Pessoa.class.php');
session_start();
 	class Usuario extends Pessoa{
 		private $id;
 		private $login;
 		private $senha;
 		private $foto;
 		private $amigos;

 		function __construct($_id=null,$_nome=null,$_nomeusuario=null,$_login=null,$_senha=null,$_nascimento=null,$_foto=null){
 			parent::__construct($_nome,$_nomeusuario,$_nascimento);
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
 			$query= "insert into Usuario Values" . "(NULL,' $this->nome ',' $this->login ',' $this->senha ',' null ',' $this->foto',' $this->nascimento','$this->nomeusuario')";
                        $mysqli->query($query);
		if($mysqli->affected_rows==1){
			$b="usuario cadastrado com sucesso";
                        return $b;
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
		<form name="incluir" action="InserirUsuario.php" method="POST" enctype="multipart/form-data">
			Nome: <input type="text" name="nome" value=""/><br>
			Sobrenome :<input type="text" name="sobrenome" value=""/><br>
			Email: <input type="email" name="email" value=""/><br>
			Senha: <input type="password" name="senha" value=""/><br>
			Nascimento: <input type="date" name="nascimento" value=""/><br>
			Foto:<input type="file" name="foto"/></br>
			 <input type="submit" name="Enviar" value="Enviar"/><br>
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
        public function VerificaUsuario($mysqli) {
            $sql= "Select * from usuario where senha='$this->senha' and nome='$this->login' or login='$this->login'";
            $resultado= $mysqli->query($sql);
            if($mysqli->affected_rows>=1){
                return true;
            }else{
                return false;
            }
        }
}
?>
