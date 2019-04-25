<?php

	include "../class/ClassCrud.php";
	session_start();
	$idUser = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS);

	$crud = new ClassCrud();
	$crud->delDB(
		"usuarios",
		"id = ?",
		array($idUser)
	);
	if($crud){

	$_SESSION['msg'] = "<div class='alert alert-success' role='alert'>Deletado com sucesso!</div>";
	header('location:../selecao.php');

}else{

	$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>ERRO!</div>";
	header('location:../selecao.php');

}
?>


