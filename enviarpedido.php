<?php
include_once 'functions.php'
 function btn_pedidos() {
		global $db, $errors;

if(isset($_POST['btn_pedidos'])):
	$pedido = e( $_POST['pedido']);
	$title = e($ $_POST['title']);
	

	$query = "INSERT INTO pedido ( pedido, title ) VALUES ('$pedido', '$title')";

	if(mysqli_query($db, $sql)):
		$_SESSION['mensagem'] = "Enviado com sucesso!";
		header('Location: index.php');
	else:
		$_SESSION['mensagem'] = "Erro ao Enviar";
		header('Location: index.php');
	endif;
endif;

}
?>