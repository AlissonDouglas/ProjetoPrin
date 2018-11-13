<?php include_once 'includes/header.inc.php' ?>
<?php include_once 'includes/menu.inc.php' ?>

<?php include('functions.php') ?>

<!DOCTYPE html>
<html>
<head>
	<title>Área de Registro</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	
	<div class="row container">
		<p>&nbsp;</p>
	
		<fieldset class="formulario" style="padding: 15px;"> <legend></legend>
			<h5 class="ligth center">Cadastro</h5>
			<br> <br> 
		    <fieldset style="padding: 15px;  width: 450px; float: left;" > <legend><h6>Administrador</h6></legend>
		    	<a class="btn waves-effect waves-light" type="submit" href="admincadastro.php">Cadastrar-se</a>
		    </fieldset>
		    <fieldset style="padding: 15px; width: 450px; float: left;"> <legend><h6>Aluno</h6></legend>
		    	<a class="btn waves-effect waves-light" type="submit" href="usercadastro.php">Cadastrar-se</a>
		    </fieldset>
 			
		</fieldset>
	</div>

<?php include_once 'includes/footer.inc.php' ?>