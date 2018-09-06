<?php include_once 'includes/header.inc.php' ?>
<?php include_once 'includes/menu.inc.php' ?>

<?php 
	include('functions.php');

	if (!isAdmin()) {
		$_SESSION['msg'] = "Você precisa fazer o login primeiro!";
		header('location: ../login.php');
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<script type="text/javascript">
	function Nova(){location.href=" create_user.php"}
	</script>
</head>
<body>
	<div class="ligth center">
		<h5>Admin - Home </h5>
	</div>
	<div class="row container">
		<div class="col s12"></div>
		<hr>
		<!-- Mensagem do usuario logado -->
		
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h5>
					<?php 
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>
				</h5>
			</div>
		<?php endif ?>
		
		<!-- Modifições do adm de notificação entrada -->
		<div class="profile_info">
			<fieldset class="formulario" style="padding: 15px;"> <legend><img src="imagens/ifal.png" alt="[imagem]" width="50"></legend>

			<div>
				<?php  if (isset($_SESSION['user'])) : ?>
					<strong><?php echo $_SESSION['user']['username']; ?></strong>
					<br>
					<small>
						<i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i> 
						<br>
						<a href="home.php?logout='1'" class="btn red">Sair</a>
						&nbsp;						
						<div class="input-field col s12"></div>
						<button class="btn blue waves-effect waves-light" type="submit" onClick="Nova()">Adicionar
			   			 <i class="material-icons right">add_circle</i>
			  			</button>
					</small>

				<?php endif ?>
			</div>
			
		</fieldset>
	</div>
		
</body>
</html>

<?php include_once 'includes/footer.inc.php' ?>