<?php
	include "includes/header.php";
	include "class/ClassCrud.php";
	session_start();
?>
<div class="content">
<h1>visualizar</h1>
	 <?php 
	 	$crud = new ClassCrud();
	 	$idUser = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
	 	$bFetch = $crud->selectDB(
	 		"*",
	 		"usuarios",
	 		"where id=?",
	 		array($idUser)
	 	);

	 	$fetch = $bFetch->fetch(PDO::FETCH_ASSOC);

	 ?>
	 <h2>Dados do Ocorrido</h2><hr>
	 <strong>ID: </strong><?php echo $fetch['id']; ?><br>
	 <strong>Cidade: </strong><?php echo $fetch['cidade']; ?><br>
	 <strong>Estado: </strong><?php echo $fetch['estado']; ?><br>
	 <strong>Data: </strong><?php echo date('d/m/Y', strtotime($fetch['data']));?><br>
	 <button type="button" class="btn btn-success"  onClick="history.go(-1)">Voltar</button>
</div>


<?php include "includes/footer.php";?>
