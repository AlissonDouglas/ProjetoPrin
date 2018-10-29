<?php include_once 'includes/header.inc.php' ?>
<?php include_once 'includes/menu.inc.php' ?>
<?php include_once'functions.php' ?>

<div class="row container">
	<p>&nbsp;</p>
	
	<form method="post" action="addevento.php" class="cool s12">
		<fieldset class="formulario" style="padding: 15px;"> <legend></legend>
			<div class="ligth center">
				<h5>Admin - Adicionando Eventos</h5>
			</div>
		
		<div class="input-field col s12">

			<div class="input-field col s12">
				<label>Titulo</label>
				<input type="text" name="title">
			</div>
			<div class="input-field col s12">
				<label>Descrição</label>
				<input type="text" name="descricao" >
			</div>



			<button type="submit" class="btn blue waves-effect waves-light" name="save"> Adicionar</button>
			<input class="" type="button" value="Voltar" onClick="history.go(-1)"> 
		</div>
			
			</fieldset>
		</form>
	</div>
<?php include_once 'includes/footer.inc.php' ?>