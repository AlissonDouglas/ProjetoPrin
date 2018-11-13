<?php include_once 'includes/header.inc.php' ?>
<?php include_once 'includes/usermenu.inc.php' ?>

<?php include('functions.php') ?>

	<title>Perfil</title>

	<?php 

			$sql = "SELECT * FROM user";
			$query = mysqli_query($db, $sql) or die(mysqli_error($db));

			while($sql = mysqli_fetch_array($query)){
			$matricula       =  $sql['matricula'];
			$cpf       =  $sql['cpf'];
			$nome       =  $sql['nome'];
			$rg       =  $sql['rg'];
			$datanasc       =  $sql['datanasc'];
			$email       =  $sql['email'];
			$username    =  $sql['username'];
			
			?> 
	<div class="row container">
	<p>&nbsp;</p>
		
			<fieldset class="formulario" style="padding: 15px;"> <legend><img src="imagens/avatar.png" alt="[imagem]" width="50"></legend>
				<h5 class="ligth center">Perfil</h5>

			<div class="col s12" >
				<i class="material-icons prefix">folder_shared</i>
				<label style="font-size: 16px">Matrícula: </label>
				<?php echo $matricula ?>
			</div>

			 <div class=" col s12">
				<i class="material-icons prefix">picture_in_picture</i>
				<label style="font-size: 16px">CPF: </label>
				<?php echo $cpf ?>				
			</div>

			<div class=" col s12">
				<i class="material-icons prefix">account_circle</i>
				<label style="font-size: 16px">Nome Completo: </label>
				<?php echo $nome ?>				
			</div>

			<div class="i col s12">
				<i class="material-icons prefix">fingerprint</i>
				<label style="font-size: 16px">RG: </label> 	
				<?php echo $rg ?>
			</div>

			<div class="col s12">
				<i class="material-icons prefix">insert_invitation</i>
				<label style="font-size: 16px">Data de nascimento: </label>		
				<?php echo $datanasc ?>		
			</div>

			<div class=" col s12">
				<i class="material-icons prefix">email</i>
				<label style="font-size: 16px">E-mail: </label>
				<?php echo $email ?>
			</div>

			<div class=" col s12">
				<i class="material-icons prefix">person_pin</i>
				<label style="font-size: 16px">Login: </label>
				<?php echo $username ?>
			</div>
			
			<div class="input-field col s12"></div>
			<button class="btn blue waves-effect waves-light" type="submit"  name="">Editar
   			 <i class="material-icons right">send</i>
  			</button>
			
		
				</fieldset>
		
	</div>
<?php } ?>
<?php include_once 'includes/footer.inc.php' ?>