<?php include_once 'includes/header.inc.php' ?>
<?php include_once 'includes/menuadmin.inc.php' ?>

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
						
						&nbsp;						
						<div class="input-field col s12"></div>
			  			<a href="addevento.php" class="btn green">Add evento</a>
					</small>
<br>
				<?php endif ?>
			</div>
			
		</fieldset>
	</div>
		

<?php include_once 'includes/footer.inc.php' ?>