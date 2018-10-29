<?php include_once 'includes/header.inc.php' ?>
<?php include_once 'includes/menu.inc.php' ?>

<?php 
	include('functions.php');

	if (!isAdmin()) {
		$_SESSION['msg'] = "Você precisa fazer o login primeiro!";
		header('location: ../login.php');
	}

?>

	<title>Home</title>
	<script type="text/javascript">
	function Nova(){location.href=" create_user.php"}
	</script>

	<div class="ligth center">
		<h5>Admin - <?php  if (isset($_SESSION['user'])) : ?><strong><?php echo $_SESSION['user']['username']; ?></strong></h5>
	</div>
	
	<div class="row container">
		<div class="col s12"></div>
		<hr>
		
		<!-- Modifições do adm de notificação entrada -->
		<div class="profile_info">
			<fieldset class="formulario" style="padding: 15px;"> <legend><img src="imagens/ifal.png" alt="[imagem]" width="50"></legend>

			<div>
				
					<br>
					
						<small>
						<a href="index.php?logout='1'" class="btn red">Sair</a>
						&nbsp;						
						<div class="input-field col s12"></div>
						<button class="btn blue waves-effect waves-light" type="submit" onClick="Nova()">Cadastrar ADM
			   			 <i class="material-icons right">add_circle</i>
			  			</button>
			  			<a href="listauser.php" class="btn black">listar</a>
			  			<a href="addevento.php" class="btn green">Adicionar Evento</a>
						<input type="button" value="Voltar" onClick="history.go(-1)"> 
					</small>
<br>
				<?php endif ?>
			</div>
			
		</fieldset>
	</div>
		

<?php include_once 'includes/footer.inc.php' ?>