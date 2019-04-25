
<?php
include "class/ClassCrud.php";

#edicao de dados
	if(isset($_GET['id'])){
		$acao = "Editar";
			$crud = new ClassCrud();
			$bFetch = $crud->selectDB(
				"*",
				"usuarios",
				"where id=?",
				array($_GET['id'])
			);
			$fetch = $bFetch->fetch(PDO::FETCH_ASSOC);
			$id = $fetch['id'];
			$cidade = $fetch['cidade'];
			$estado = $fetch['estado'];
			$data = $fetch['data'];

#cadastro novo
	}else{
		$acao = "Cadastrar";
		$id = "";
		$cidade = "";
		$estado = "";
		$data = "";

	}
?>

<h1><?php echo $acao; ?></h1>	<hr>
<div>

	<form method="post" name="form" action="controllers/ControllersCadastro.php" >
		<input type="hidden" id="acao" name="acao" value="<?php echo $acao; ?>">
		<input type="hidden" id="id" name="id" value="<?php echo $id; ?>">
		
		<h5><?php echo "ID: ". $id ; ?></h5>
		<div class="col-md-9 offset-md-2">
		<div class="form-row">
    <div class="col-md-5 mb-4">
      <label >Cidade</label>
      <input type="text" name="cidade" class="form-control" id="cidade" value="<?php echo $cidade; ?>" placeholder="Cidade" >
    </div>

		<div class="col-md-3 mb-4">
			<label for="inputEstado">Estado</label>
			<select name="estado" id="estado"  class="form-control" >
			<?php  ?>
				<option selected><?php echo $estado = (!isset($estado)) ? 'valor padrão' : $estado;?></option>
				<?php ?>
				<option value="AC">Acre</option>
				<option value="AL">Alagoas</option>
				<option value="AP">Amapá</option>
				<option value="AM">Amazonas</option>
				<option value="BA">Bahia</option>
				<option value="CE">Ceará</option>
				<option value="DF">Distrito Federal</option>
				<option value="ES">Espírito Santo</option>
				<option value="GO">Goiás</option>
				<option value="MA">Maranhão</option>
				<option value="MT">Mato Grosso</option>
				<option value="MS">Mato Grosso do Sul</option>
				<option value="MG">Minas Gerais</option>
				<option value="PA">Pará</option>
				<option value="PB">Paraíba</option>
				<option value="PR">Paraná</option>
				<option value="PE">Pernambuco</option>
				<option value="PI">Piauí</option>
				<option value="RJ">Rio de Janeiro</option>
				<option value="RN">Rio Grande do Norte</option>
				<option value="RS">Rio Grande do Sul</option>
				<option value="RO">Rondônia</option>
				<option value="RR">Roraima</option>
				<option value="SC">Santa Catarina</option>
				<option value="SP">São Paulo</option>
				<option value="SE">Sergipe</option>
				<option value="TO">Tocantins</option>
			</select>
    	</div>

			<div class="form-row text-center">
				<div class="col-md-12 mb-4 text-center">
					<label>Data:</label><input type="date" name="data" id="data" value="<?php echo $data; ?>" class="form-control">
				</div>
			</div>
		<br>
		<div class="col-md-6 offset-md-2">
			<button type="submit" onclick="return validarForm()"  class="btn btn-success"><?php echo $acao; ?></button>
			<input type="button" class="btn btn-primary" value="Cancelar" onclick="javascript: location.href='index.php';" />
		</div>
		</div>
	</form>
</div>
