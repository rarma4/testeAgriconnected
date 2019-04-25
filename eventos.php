<?php
	session_start();
	include "includes/header.php";
	include "class/ClassCrud.php";

?>
<div class="content">
	<h1>Eventos</h1>
	
		<?php
		if (isset($_SESSION['msg']) && $_SESSION['msg']!= null){
		echo $_SESSION['msg'];
		unset($_SESSION['msg']);
		}
		?>

	<!-- select estado, count(estado) from usuarios group by estado;    -->
	<div class="col-md-6 offset-md-3">
		<table class="table table-striped">
			<thead>
				<tr>
					<th scope="col-4">Estado</th>
					<th scope="col-4">Total de Eventos</th>

				</tr>
			</thead>
				<tbody>
					<!-- Loop -->
					<?php
						$pdo = new PDO("mysql: host=localhost; dbname=agriconnected","root","");
						$consulta = $pdo->query("SELECT estado, count(estado) from usuarios group by estado" );
										while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)){
									?>
								<tr>
									<td><?php echo $linha["estado"];?></td>
									<td><?php echo $linha["count(estado)"];?></td>
								</tr>
					<?php } ?>
				</tbody>
			</table>
	</div>
</div>

<?php include "includes/footer.php";?>