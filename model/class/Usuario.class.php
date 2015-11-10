<?php
require_once ('Pessoa.class.php');
 	class Usuario extends Pessoa{
 		private $id;
 		private $login;
 		private $senha;
 		private $foto;
 		private $amigos;
                private $tipo;
 		function __construct($_id=null,$_nome=null,$_nomeusuario=null,$_login=null,$_senha=null,$_nascimento=null,$_tipo=null,$_foto=null){
 			parent::__construct($_nome,$_nomeusuario,$_nascimento);
 			$this->foto=$_foto;
 			$this->login=$_login;
 			$this->senha=$_senha;
 			$this->foto=$_foto;
 			$this->id=$_id;
                        $this->tipo=$_tipo;
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
                function getTipo(){
 			return $this->tipo;
 		}
                function setTipo($_tipo){
 			 $this->tipo=$_tipo;
 		}
 		function setFoto($_foto){
 			 $this->foto=$_foto;
 		}
 		function InserirUsuario($mysqli){
 			$query= "insert into Usuario Values" . "(NULL,'$this->nome','$this->login','$this->senha','$this->tipo','$this->foto','$this->nascimento','$this->nomeusuario')";
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
		$query="Select * from usuario Where nomeusuario like '$this->nomeusuario'";
		$resultado=$mysqli->query($query);
		$linha=$resultado->fetch_array();
                $this->id=$linha['idUsuario'];
		$this->nome=$linha['nome'];
	}
        function MostraUsuario($mysqli){
		$query="Select * from usuario Where nomeusuario like %'$this->nome'%";
		$resultado=$mysqli->query($query);
		$linha=$resultado->fetch_array();
		$this->nome=$linha['nome'];
		$this->login=$linha['email'];
		$this->senha=$linha['senha'];
		$this->nascimento=$linha['nascimento'];
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
            $sql= "Select * from usuario where senha='$this->senha' and tipo='$this->tipo' and nomeusuario='$this->login' or email='$this->login'";
            $resultado= $mysqli->query($sql) or die($mysqli->error);
            $linha=$resultado->fetch_array();
            if($mysqli->affected_rows>=1){
                return true;
            }else{
                return false;
            }
        }
        public function VerificaAdm($mysqli) {
            $sql= "Select * from usuario where senha='$this->senha' and tipo='$this->tipo' and nomeusuario='$this->login' or email='$this->login' ";
            $resultado= $mysqli->query($sql) or die($mysqli->error);
            $linha=$resultado->fetch_array();
            if($mysqli->affected_rows>=1){
                return true;
            }else{
                return false;
            }
        }
}
?>
