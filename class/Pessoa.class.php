<?php
class Pessoa{
	protected  $nome;
	protected  $sobrenome;
	protected  $nascimento;
	function __construct($_nome=null,$_sobrenome=null,$_nascimento=null){
		$this->nome= $_nome;
		$this->sobrenome = $_sobrenome;
		$this->nascimento = $_nascimento;
	}
	function getNome(){
 			return $this->nome;
 		}
 		function setNome($_nome){
 			$this->nome=$_nome;
 		}
 		function getSobrenome(){
 			return $this->sobrenome;
 		}
 		function setSobrenome($_sobrenome){
 			$this->sobrenome=$_sobrenome;
 		}
 		function getNascimento(){
 			return $this->nascimento;
 		}
 		function setNascimento($_nascimento){
 			$this->nascimento=$_nascimento;
 		}
}
?>