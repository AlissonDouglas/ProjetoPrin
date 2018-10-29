
<nav class="blue-grey">
	<div class="nav-wrapper container">
		<div class="brand-logo ligth">AJUDA DE CUSTO</div>
		<ul class="right" class="collapsible expandable">
			<li><a href=""><i class="material-icons left">notifications</i></a></li>
			<li><a href="userperfil.php"><i class="material-icons left">account_box</i>Perfil</a></li>
			<li><a href="eventos.php"><i class="material-icons left">assistant_photo</i>Eventos</a></li>
			<li><a href="#"  onclick="if (divId.style.display='none'){ divId.style.display='block'; divId.show();} else { divId.style.display='none';} ";><i class="material-icons left">more_vert</i></a></li>

			<div id="divId" style=" margin-top: 65px; 
			display: none;  
			position: fixed;
		    width: 150px;
		    height: 150px;
		    left: 75%;
		    top: 20%;
		    margin: -100px -100px 0 0;">
			    <form action="functions.php">
					<button style="width: 150px;
			   	 height: 40px;" type="submit" name="logout" >Sair</button>
				</form>
			</div>

			
		</ul>	
	
	</div>
</nav>