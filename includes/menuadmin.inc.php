
<nav class="blue-grey">
	<div class="nav-wrapper container">
		<div class="brand-logo ligth">AJUDA DE CUSTO</div>
		<ul class="right" class="collapsible expandable">
			<li><a href="adm.php"><i class="material-icons left">home</i>Home</a></li>
			<li><a href="listauser.php"><i class="material-icons left">list</i>Lista</a></li>
			<li><a href="eventos.php"><i class="material-icons left">assistant_photo</i>Eventos</a></li>

			<li><a href="#"  onclick="if (divId.style.display='none'){ divId.style.display='block'; divId.show();} else { divId.style.display='none';} ";><i class="material-icons left">more_vert</i></a></li>

			<div id="divId" style=" margin-top: 65px; 
			display: none;  
			position: fixed;
		    width: 150px;
		    height: 150px;
		    left: 80%;
		    top: 15%;
		    margin: -100px -100px 0 0;">
		   
		    <ul class="right" >
   			<li><a href="index.php?logout='1'">Sair</a></li>
   			</div>

			
		</ul>	
	
	</div>
</nav>