<?php
	include "includes/header.php";
	session_start();
?>
<div class="content">

	<?php
		if (isset($_SESSION['msg']) && $_SESSION['msg']!= null){
		echo $_SESSION['msg'];
		unset($_SESSION['msg']);
		}
	?>

</div>
<?php include "includes/formCadastro.php";?>

<?php include "includes/footer.php";?>