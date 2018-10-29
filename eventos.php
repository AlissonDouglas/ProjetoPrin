<?php include_once 'includes/header.inc.php' ?>
<?php include_once 'includes/menu.inc.php' ?>
<?php 
include('functions.php');
$results = mysqli_query($db, "SELECT * FROM eventos"); ?>

<?php while ($row = mysqli_fetch_array($results)) { ?>

    <div class="card small"  style="width: 300px; float: left; margin-left: 5px;">
        <div class="card-image waves-effect waves-block waves-light" style="width: 300px; height: 250px"> 
          <img class="activator"src="">  
        </div> 
        <div class="card-content">
          <span class="card-title activator grey-text text-darken-4"> <?php echo $row['title']; ?> <i class="material-icons right">more_vert</i></span>
        </div>
        <div class="card-reveal">
          <span class="card-title grey-text text-darken-4">Descrição do evento<i class="material-icons right">close</i></span>
          <p><?php echo $row['description'] ?></p>
        </div>
      </div>
 
<?php } 
 /*<?php echo "<img src='imagens/img_eventos".$imagem."' alt='Foto de exibição' />"; ?> */
 
?>


<?php include_once 'includes/footer.inc.php' ?>