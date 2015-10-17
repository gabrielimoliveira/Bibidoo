<?php
class Pessoa{
	protected  $nome;
	protected  $nomeusuario;
	protected  $nascimento;
	function __construct($_nome=null,$_nomeusuario=null,$_nascimento=null){
		$this->nome= $_nome;
		$this->nomeusuario = $_nomeusuario;
		$this->nascimento = $_nascimento;
	}
	function getNome(){
 			return $this->nome;
 		}
 		function setNome($_nome){
 			$this->nome=$_nome;
 		}
 		function getNomeUsuario(){
 			return $this->nomeusuario;
 		}
 		function setNomeUsuario($_nomeusuario){
 			$this->nomeusuario=$_nomeusuario;
 		}
 		function getNascimento(){
 			return $this->nascimento;
 		}
 		function setNascimento($_nascimento){
 			$this->nascimento=$_nascimento;
 		}
}
?>