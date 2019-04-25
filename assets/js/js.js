
function confirmE() {
   if (confirm("Tem certeza que deseja excluir?")) {
		location.href="<?php controllers/ControllersDel.php?id={$fetch['id']}?>";
   }else{
		window.event.preventDefault()
   }
}
function validarForm() {
   var cidade = form.cidade.value;
   var estado = form.estado.value;

   if (cidade == "" || cidade.length < 3 || cidade == null) {
      alert('Por favor digite Sua Cidade');
      form.cidade.focus();
      return false;
   }

   if (estado == "" || estado == null ) {
      alert('Por favor Escolha Seu Estado');
      form.estado.focus();
      return false;
   }
     
}
