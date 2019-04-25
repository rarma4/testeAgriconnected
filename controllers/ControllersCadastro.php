<?php
session_start();
include ("../includes/variaveis.php");
include ("../class/ClassCrud.php");

if($acao == "Cadastrar"){
	$crud = new ClassCrud();
	$crud->insertDB(
	        "usuarios",
	        "?,?,?,?",
	        array($id, $cidade, $estado, $data)
	);
	$_SESSION['msg'] = "<div class='alert alert-success' role='alert'>Gravado com sucesso!</div>";
	header('location:../cadastro.php');
echo $acao;
}else{
	$crud = new ClassCrud();
	$crud->editDB(
		"usuarios",
		"cidade=?, estado=?, data=?",
		"id=?",
		array($cidade, $estado, $data, $id)
	);
	$_SESSION['msg'] = "<div class='alert alert-success' role='alert'>Editado com sucesso!</div>";
	header('location:../selecao.php');
	echo $acao;
}
?>