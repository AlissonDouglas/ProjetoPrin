<?php include_once 'includes/header.inc.php' ?>
<?php include_once 'includes/menu.inc.php' ?>


<?php 
	include('functions.php');

	if (!isLoggedIn()) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="ligth center">
		<h5>Home page</h5>

	</div>
	<div class="row container">
			<div class="col s12"> 
		<hr>
		<!-- mensagem de notificação -->
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3>
					<?php 
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>

		<!-- Informações sobre o usuário logado -->
		
		<?php  if (isset($_SESSION['user'])) : ?>
			<p>Bem-vindo <strong><?php echo $_SESSION['user']['username']; ?></strong></p>
			<small>
				<i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i> 
				<br>
				<a href="index.php?logout='1'" style="color: red;">Sair</a>
			</small>
		<?php endif ?>
		
  				
		</div>
	</div>	
</body>
</html>
<?php include_once 'includes/footer.inc.php' ?>

