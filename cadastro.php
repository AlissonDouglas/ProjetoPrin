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
		<form method="post" action="cadastro.php" class="cool s12">
			<fieldset class="formulario" style="padding: 15px;"> <legend><img src="imagens/avatar.png" alt="[imagem]" width="50"></legend>
				<h5 class="ligth center">Cadastro</h5>
			
			<?php include('errors.php'); ?>


			<div class="input-field col s12">
				<i class="material-icons prefix">account_circle</i>
				<input type="text" name="username" value="<?php echo $username; ?>" maxlength="40">
				<label>Nome do Usuário</label>
				
			</div>

			<div class="input-field col s12">
				<i class="material-icons prefix">email</i>
				<input type="email" name="email" value="<?php echo $email; ?>" maxlength="50">
				<label>Email</label>
			</div>
			<div class="input-field col s12">
				<i class="material-icons prefix">lock</i>
				<label>Senha</label>
				<input type="password" name="password_1">
			</div>
			<div class="input-field col s12">
				<i class="material-icons prefix">lock</i>
				<label>Confirme a Senha</label>
				<input type="password" name="password_2" >
			</div>
			
			<div class="input-field col s12"></div>
			<button class="btn blue waves-effect waves-light" type="submit"  name="register_btn">Cadastrar
   			 <i class="material-icons right">send</i>
  			</button>
			<input type="reset" value="Limpar" class="btn red">
		
			</fieldset>
		</form>
	</div>
</body>
</html>

<?php include_once 'includes/footer.inc.php' ?>
