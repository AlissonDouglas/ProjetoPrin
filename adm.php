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
			  			
					</small>



<br>
		<?php $results = mysqli_query($db, "SELECT * FROM users"); ?>
		<table class="striped ">
			<thead>
				<tr>
					<th>Name</th>
					<th>Email</th>
					<th colspan="2">Avaliação</th>
				</tr>
			</thead>
	
		<?php while ($row = mysqli_fetch_array($results)) { ?>
			<tr>
				<td><?php echo $row['username']; ?></td>
				<td><?php echo $row['email']; ?></td>
				<td>
					<a href="index.php?edit=<?php echo $row['id']; ?>" class="edit_btn" ><label><input type="checkbox" class="filled-in"  /><span>Aceito</span></label></a>
				</td>
				<td>
					<a href="server.php?del=<?php echo $row['id']; ?>" class="del_btn"><label><input type="checkbox" class="filled-in" /><span>Negado</span></label></a>
				</td>
				</tr>
				<?php } ?>
			</table>


			
				<?php endif ?>
			</div>
			
		</fieldset>
	</div>
		

<?php include_once 'includes/footer.inc.php' ?>