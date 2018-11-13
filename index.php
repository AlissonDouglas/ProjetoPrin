<?php include_once 'includes/header.inc.php' ?>
<?php include_once 'includes/usermenu.inc.php' ?>
<?php 		include('functions.php');  		$results = mysqli_query($db, "SELECT * FROM eventos"); ?>



	
	<title>Home</title>
	<div class="ligth center">
		<h5>Home page</h5>

	</div>
	<div class="row container">
			<div class="col s12"> 
		

	<form method="POST" action="" class="cool s12" >
		<fieldset class="formulario" style=" padding: 15px;"> 
	<input type="hidden" name="id" value="<?php echo $dados['id'];?>">
	
	<!-- Informações sobre o usuário logado -->
		
			<legend>

		<img src="imagens/avatar.png" alt="[imagem]" width="50" <?php  if (isset($_SESSION['user'])) : ?>
			<p> <strong><?php echo $_SESSION['user']['nome']; ?></strong></p>
	<?php endif ?>
	</legend>
		

	<div class="input-field col s12">
		<i class="material-icons prefix">short_text</i>
		<input placeholder="Digite seu texto para pedido de ajuda de custo" type="text" name="pedido" >
	</div>


			<div class="input-field col s12 m6">
				<i class="material-icons prefix">clear_all</i>
			<label>Eventos disponiveis</label>
					<select name="ev" id="ev" >
					<option></option>
					<?php while ($row = mysqli_fetch_array($results)) { ?>
						<option value="<?php echo $title ?>"><?php echo $row['title']; ?></option>
						<?php } ?>
					</select>
		</div>

	<div class="input-field col s12">
			<button class="btn" type="submit" name="btn_pedidos" >Save</button>
			<a class="btn red" href="index.php?logout='1'">Sair</a>
		
	</div>

</form>
		
  				
		</div>
	</div>	

<?php include_once 'includes/footer.inc.php' ?>