<?php include_once 'includes/header.inc.php' ?>
<?php include_once 'includes/menu.inc.php' ?>


<?php include('functions.php') ?>

	<div class="row container">
	
		<p>&nbsp;</p>
	
		<form method="post" action="login.php" class="cool s12">
			<fieldset class="formulario" style=" padding: 15px;"> <legend><img src="imagens/ifal.png" alt="[imagem]" width="50"></legend>
				<h5 class="ligth center">Login</h5>

		<?php include('errors.php'); ?>

				<div class="input-field col s12">
					<i class="material-icons prefix">account_circle</i>
					<input type="text" name="username" >
					<label>Nome do Usuário</label>
					
				</div>
				
				<div class="input-field col s12">
					<i class="material-icons prefix">lock</i>
					<input type="password" name="password">
					<label>Senha</label>
				</div>
				
				<div class="input-group">
					<button type="submit" class="btn" name="login_btn">Login</button>
				</div>
				
		</form>
	</div>


<?php include_once 'includes/footer.inc.php' ?>