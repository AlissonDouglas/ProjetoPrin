<?php include_once 'includes/header.inc.php' ?>
<?php include_once 'functions.php'; ?>

<?php if(isLoggedIn()){
  if(isAdmin()){
    include_once 'includes/usermenu.inc.php';
  } else {
    include_once 'includes/menuadmin.inc.php';
  }
}
 ?>


  <title>Eventos</title>

<?php 

$sql = "SELECT * FROM eventos";
$query = mysqli_query($db, $sql) or die(mysqli_error($db));

while($sql = mysqli_fetch_array($query)){
$codigo = $sql["codigo"];
$imagem = $sql["image"] ;
$titulo = $sql["title"];
$data = $sql["data"];
$hora = $sql["hora"];
$descricao = $sql["description"];

//Formatando data e hora
$data = date('d/m/Y', strtotime($data));
$hora =  date ('H:i', strtotime($hora));

$atualdata = date('d/m/Y');

if(strtotime($atualdata) > strtotime($data) ){
$sql2= "DELETE FROM eventos WHERE codigo=".$classodigo;
$result = mysqli_query($db, $sql2);
break;
/*if(!$result)
  die("Falha ao executar o comando: " . mysqli_error($db));
  else
  echo "Dados excluídos com sucesso.";*/
}

?> 

<div class="card small"  style="width: 300px; float: left; margin-left: 5px;">
  <div class="card-image waves-effect waves-block waves-light" style="width: 300px; height: 250px"> 
    <?php echo "<img src='imagens/img_eventos/".$imagem."' alt='Foto de exibição' />"; ?>  
  </div> 
  <div class="card-content">
    <span class="card-title activator grey-text text-darken-4"> <?php echo $titulo ?> <i class="material-icons right">more_vert</i></span>
    <?php if (isAdmin()){
      ?>
      <p> <a href="index.php" >Cadastrar</a> </p>
    <?php 
      } else { ?>
    <p> <a href="<?php if(isLoggedIn()){  echo 'pedidos.php'; } else { echo 'login.php'; }?>" >Solicitar ajuda de custo</a> </p>
    <?php } ?>
  </div>
  <div class="card-reveal">
    <span class="card-title grey-text text-darken-4"> <?php echo $data, ' às ', $hora; ?> <i class="material-icons right">close</i></span>
    <p><?php echo $descricao ?></p>
  </div>
</div>

<?php   } 
include_once 'includes/footer.inc.php' ?>