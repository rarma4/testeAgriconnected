<?php
	session_start();
	include "includes/header.php";
	include "class/ClassCrud.php";

?>
<div class="content">
<h1>Seleção</h1>
	<div class="col-sm">
		<form method="post" action="#">
			<div class="form-group">
				<label><input type="text" name="pesquisar" id="pesquisar" placeholder="Pesquisar" autofocus></label>
				<button type="submit" ><img src="assets/images/search.png" title="Pesquisar" width="20" height="20"></button>
			</div>
		</form>
	</div>
		<?php
		if (isset($_SESSION['msg']) && $_SESSION['msg']!= null){
		echo $_SESSION['msg'];
		unset($_SESSION['msg']);
		}
		?>
<table class="table table-striped">
	<thead>
		<tr>
			<th scope="col">ID</th>
			<th scope="col">Cidade</th>
			<th scope="col">Estado</th>
			<th scope="col">Data</th>
			<th scope="col">Ações</th>

		</tr>
	</thead>
		<tbody>
			<!-- Loop -->
			<?php
				if(isset($_POST['pesquisar'])){
					$pesquisar = filter_input(INPUT_POST,'pesquisar',FILTER_SANITIZE_SPECIAL_CHARS);
				}else{
					$pesquisar = "";
				}

				if(isset($pesquisar)&& $pesquisar != null){
					$crud = new ClassCrud();
								$bFetch=$crud->selectDB(
									"*",
									"usuarios",
									"where nome like ?",
									array($pesquisar)
								);
								while ($fetch = $bFetch->fetch(PDO::FETCH_ASSOC)){
							?>
						<tr>
							<td><?php echo $fetch['id'];?></td>
							<td><?php echo $fetch['cidade'];?></td>
							<td><?php echo $fetch['estado'];?></td>
							<td><?php echo date('d/m/Y', strtotime($fetch['data']));?></td>
							<td>
								<a href="<?php echo"visualizar.php?id={$fetch['id']}"; ?>"><img src="assets/images/search.png" title="visualizar"></a>
								<a href="<?php echo"cadastro.php?id={$fetch['id']}"; ?>"><img src="assets/images/edit.png" title="Editar"></a>
								<a href="<?php echo"controllers/ControllersDel.php?id={$fetch['id']}" ?>"><img src="assets/images/delete.png" title="Deletar"></a>

							</td>
						</tr>
							<?php }}else{ 

					$crud = new ClassCrud();
								$bFetch=$crud->selectDB(
									"*",
									"usuarios",
									"",
									array()
								);
								while ($fetch = $bFetch->fetch(PDO::FETCH_ASSOC)){
							?>
						<tr>
							<td><?php echo $fetch['id'];?></td>
							<td><?php echo $fetch['cidade'];?></td>
							<td><?php echo $fetch['estado'];?></td>
							<td><?php echo date('d/m/Y', strtotime($fetch['data']));?></td>
							
							<td>
								<a href="<?php echo"visualizar.php?id={$fetch['id']}"; ?>"><img src="assets/images/search.png" title="visualizar"></a>
								<a href="<?php echo"cadastro.php?id={$fetch['id']}"; ?>"><img src="assets/images/edit.png" title="Editar"></a>
								<a href="<?php echo"controllers/ControllersDel.php?id={$fetch['id']}" ?>" class="confirm" onClick="confirmE()"><img src="assets/images/delete.png" title="Deletar"></a>

							</td>
						</tr>
							<?php }} ?>

		</tbody>
	</table>
</div>


<?php include "includes/footer.php";?>