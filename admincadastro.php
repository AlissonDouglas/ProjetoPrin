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
		<form method="post" action="admincadastro.php" class="cool s12">
			<fieldset class="formulario" style="padding: 15px;"> <legend><img src="imagens/avatar.png" alt="[imagem]" width="50"></legend>
				<h5 class="ligth center">Cadastro de Administrador</h5>
			
			<?php include('errors.php'); ?>

			<div class="input-field col s12">
				<i class="material-icons prefix">folder_shared</i>
				<input type="text" required name="matricula" value="<?php echo $matricula; ?>" maxlength="9">
				<label>Matrícula SIAPE</label>
				
			</div>

			 <div class="input-field col s12">
				<i class="material-icons prefix">picture_in_picture</i>
				<input type="text" required name="cpf" value="<?php echo $cpf; ?>" maxlength="11">
				<label>CPF</label>				
			</div>

			<div class="input-field col s12">
				<i class="material-icons prefix">account_circle</i>
				<input type="text" required name="nome" value="<?php echo $nome; ?>" maxlength="100">
				<label>Nome Completo</label>				
			</div>

			<div class="input-field col s12">
				<i class="material-icons prefix">email</i>
				<input type="email" required name="email" value="<?php echo $email; ?>" maxlength="50">
				<label>Email</label>
			</div>

			<div class="input-field col s12">
				<i class="material-icons prefix">person_pin</i>
				<input type="text" required name="username" value="<?php echo $username; ?>" maxlength="40">
				<label>Login</label>
			</div>

			<div class="input-field col s12">
				<i class="material-icons prefix">lock</i>
				<label>Senha</label>
				<input type="password" required name="password_1">
			</div>
			
			<div class="input-field col s12">
				<i class="material-icons prefix">lock</i>
				<label>Confirme a Senha</label>
				<input type="password" required name="password_2" >
			</div>
			
			<div class="input-field col s12"></div>
			<button class="btn" type="submit"  name="adminregister_btn">Cadastrar
   			 <i class="material-icons right">send</i>
  			</button>
			<input type="reset" value="Limpar" class="btn red">
		
			</fieldset>
		</form>
	</div>
</body>
</html>

<?php include_once 'includes/footer.inc.php' ?>