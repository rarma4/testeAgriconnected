<?php
if (isset($_POST['acao'])){
	$acao = filter_input(INPUT_POST, 'acao', FILTER_SANITIZE_SPECIAL_CHARS);
}elseif(isset($_GET['acao'])){
	$acao = filter_input(INPUT_GET, 'acao', FILTER_SANITIZE_SPECIAL_CHARS);
}else{
	$acao = "";
}

if (isset($_POST['id'])){
	$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
}elseif(isset($_GET['id'])){
	$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
}else{
	$id = 0;
}

if (isset($_POST['cidade'])){
	$cidade = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_SPECIAL_CHARS);
}elseif(isset($_GET['cidade'])){
	$cidade = filter_input(INPUT_GET, 'cidade', FILTER_SANITIZE_SPECIAL_CHARS);
}else{
	$cidade = "";
}

if (isset($_POST['estado'])){
	$estado = filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_SPECIAL_CHARS);
}elseif(isset($_GET['estado'])){
	$estado = filter_input(INPUT_GET, 'estado', FILTER_SANITIZE_SPECIAL_CHARS);
}else{
	$estado = "";
}

if (isset($_POST['data'])){
	$data = filter_input(INPUT_POST, 'data', FILTER_SANITIZE_SPECIAL_CHARS);
}elseif(isset($_GET['data'])){
	$data = filter_input(INPUT_GET, 'data', FILTER_SANITIZE_SPECIAL_CHARS);
}else{
	$data = date('Y-m-d');
}
?>