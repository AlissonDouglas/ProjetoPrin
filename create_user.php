<?php include_once 'includes/header.inc.php' ?>
<?php include_once 'includes/menu.inc.php' ?>
<?php include('functions.php') ?>

	
	<title>Registration system PHP and MySQL - Create user</title>

	<div class="row container">
	<p>&nbsp;</p>
	
	<form method="post" action="create_user.php" class="cool s12">
		<fieldset class="formulario" style="padding: 15px;"> <legend><img src="imagens/avatar.png" alt="[imagem]" width="50"></legend>
			<div class="ligth center">
				<h5>Admin - Adicionando usuários</h5>
			</div>
		<?php echo display_error(); ?>

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
		
			<div class="input-field col s12 m6">
				<i class="material-icons prefix">clear_all</i>
			<label>Tipo de usuário</label>
			<select name="user_type" id="user_type" >
				<option value=""></option>
				<option value="admin">Admin</option>
				<option value="user">Cliente</option>
			</select>
		</div>
		
		<div class="input-field col s12">
			<button type="submit" class="btn blue waves-effect waves-light" name="register_btn"> Criar usuário</button>
		</div>
			
			</fieldset>
		</form>
	</div>
<?php include_once 'includes/footer.inc.php' ?>