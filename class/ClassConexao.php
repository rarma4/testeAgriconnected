<?php
	 abstract class ClassConexao{
		protected function conectaDB(){
		//realiza conexao com o banco de dados
			try{
				$con = new PDO("mysql:host=localhost;dbname=agriconnected","root","");
				return $con;

			}catch(PDOExeption $erro){
				return $erro->getmessage();

			}
		}
	}

?>