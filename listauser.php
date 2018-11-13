<?php include_once 'includes/header.inc.php' ?>
<?php include_once 'includes/menuadmin.inc.php' ?>

<?php 		include('functions.php');  		$results = mysqli_query($db, "SELECT * FROM user"); ?>
	<p>&nbsp;</p>

	<div class="row container">
		<form method="post" action="" class="cool s12">
			<fieldset class="formulario" style=" padding: 15px;"> <legend></legend>
					<h5 class="ligth center">PEDIDOS</h5>

				<table class="striped ">
					<thead>
						<tr>
							<th>Name</th>
							<th>Email</th>
							<th colspan="2">Avaliação</th>
						</tr>
					</thead>			
							<!--PERCORRER A TABELA-->
							<?php while ($row = mysqli_fetch_array($results)) { ?>
						<tr>
							<td><?php echo $row['username']; ?></td>
							<td><?php echo $row['email']; ?></td>
							
<!--INICIO MODAL-->
							<td><a class="btn-floating green modal-trigger" href="#modal<?php echo $row['id']; ?>" ><i class="material-icons">clear_all</i></a></td>

							  <!-- Modal Structure -->
							  <div id="modal<?php echo $row['id']; ?>" class="modal">
							    <div class="modal-content">
							      <h4>Descrição do pedido</h4>
							      <p><?php echo $row['pedido']; ?></p>
							    </div>
							  </div>
<!--FIM DO MODAL-->
							<td>
								<a class="edit_btn" ><label><input type="checkbox" class="filled-in"  /><span>Aceito</span></label></a>
							</td>
							<td>
								<a  class="del_btn"><label><input type="checkbox" class="filled-in" /><span>Negado</span></label></a>
							</td>
						</tr>
<!--FIM - PERCORRER-->				<?php } ?>
					
					</table>
			</fieldset>
		</form>
	</div>
<?php include_once 'includes/footer.inc.php' ?>