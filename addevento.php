<?php include_once 'includes/header.inc.php' ?>
<?php include_once 'includes/menuadmin.inc.php' ?>
<?php include_once'functions.php' ?>

<div class="row container">
	<p>&nbsp;</p>
	
	<form method="post" action="teste_cadastro-evento.php" class="cool s12" enctype="multipart/form-data"/>
		<fieldset class="formulario" style="padding: 15px;"> <legend></legend>
			<div class="ligth center">
				<h5>Admin - Adicionando Eventos</h5>
			</div>
			
			<form action="#">
			    <div class="file-field input-field">
			      <div class="btn">
			        <span>File</span>
			        <input type="file" required name="image">
			      </div>
			      <div class="file-path-wrapper">
			        <input class="file-path validate" type="text">
			      </div>
			    </div>
			</form>
			<input type="hidden" name="codigo"/>
			<div class="input-field col s12">
				<label>Titulo</label>
				<input type="text" name="title">
			</div>
			<div class="input-field col s12">
				<label>Descrição</label>
				<input type="text" name="description" >
			</div>
			<div class="input-field col s12">
				<label>Tempo do evento</label>
				<input type="time" name="hora" >
			</div>
			<div class="input-field col s12">
				<label>date</label>
				<input type="date" name="date" >
			</div>
			
			

			<input type="submit" >
		</div>
			
			</fieldset>
		</form>
	</div>
<?php include_once 'includes/footer.inc.php' ?>