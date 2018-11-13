
<?php

$con = mysqli_connect ("localhost", "root", "");
$db = mysqli_select_db ($con, 'registration');

if(!$con){
    die("Não foi possivel conectar ao banco de dados; " . mysql_error());
}

$codigo = $_POST['codigo'];
$imagem = $_FILES['image'];
$titulo = $_POST['title'];
$data = $_POST["date"];
$hora = $_POST["hora"];
$descricao = $_POST['description'];

// Se a foto estiver sido selecionada
	if (!empty($imagem["name"])) {
		
		// Largura máxima em pixels
		$largura = 3000000;
		// Altura máxima em pixels
		$altura = 250000;
		// Tamanho máximo do arquivo em bytes
		$tamanho = 100000;
 
		$error = array();
 
    	// Verifica se o arquivo é uma imagem
    	if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp|jpg)$/", $imagem["type"])){
     	   $error[1] = "Isso não é uma imagem.";
   	 	} 
	
		// Pega as dimensões da imagem
		$dimensoes = getimagesize($imagem["tmp_name"]);
	
		// Verifica se a largura da imagem é maior que a largura permitida
		if($dimensoes[0] > $largura) {
			$error[2] = "A largura da imagem não deve ultrapassar ".$largura." pixels";
		}
 
		// Verifica se a altura da imagem é maior que a altura permitida
		if($dimensoes[1] > $altura) {
			$error[3] = "Altura da imagem não deve ultrapassar ".$altura." pixels";
		}
		
		// Verifica se o tamanho da imagem é maior que o tamanho permitido
		if($imagem["size"] > $tamanho) {
   		 	$error[4] = "A imagem deve ter no máximo ".$tamanho." bytes";
		}
 
		// Se não houver nenhum erro
		if (count($error) == 0) {
		
			// Pega extensão da imagem
			preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $imagem["name"], $ext);
 
        	// Gera um nome único para a imagem
        	$nome_imagem = md5(uniqid(time())) . "." . $ext[1];
 
        	// Caminho de onde ficará a imagem
        	$caminho_imagem = "imagens/img_eventos/" . $nome_imagem;
 
			// Faz o upload da imagem para seu respectivo caminho
			move_uploaded_file($imagem["tmp_name"], $caminho_imagem);

		
			// Insere os dados no banco
			$sql = mysqli_query($con, "INSERT INTO eventos (codigo, image, title, data, hora, description) VALUES ('$codigo', '$nome_imagem', '$titulo', '$data', '$hora', '$descricao')");
		
			// Se os dados forem inseridos com sucesso
			if ($sql){
				echo "Evento adicionado com sucesso.";
				header('location: eventos.php');
			}
			else {
				echo "ERRO";
			}
		}
	
		// Se houver mensagens de erro, exibe-as
		if (count($error) != 0) {
			foreach ($error as $erro) {
				echo $erro . "<br />";
			}
		}
	}
 ?> 