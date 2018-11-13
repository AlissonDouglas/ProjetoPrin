<?php 
	session_start();

	// connect to database
	$db = mysqli_connect('localhost', 'root', '', 'registration');

	// declarando variaveis
	$matricula = "";
	$nivel = "";
	$cpf = "";
	$nome = "";
	$rg = "";
	$datanasc = "";
	$email    = "";
	$username = "";
	$tipo = "";
	$errors   = array();
	
	$pedido = "";
	$dados = "";
	
	$name = "";
	$address = "";
	$id = 0;
	$update = false;

	// chamar a função register () se register_btn for click
	if (isset($_POST['register_btn'])) {
		register();
	}

	// chamar a função register () se adminregister_btn for click
	if (isset($_POST['adminregister_btn'])) {
		registerAdm();
	}

	// chamar a função login () se login_btn for clicado
	if (isset($_POST['login_btn'])) {
		login();
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['user']);
		header("location: login.php");
	}

	// REGISTER USER
	function register() {
		global $db, $errors;

		// recebe todos os valores de entrada do formulário
		$matricula       =  e($_POST['matricula']);
		$nivel       =  e($_POST['nivel']);
		$cpf       =  e($_POST['cpf']);
		$nome       =  e($_POST['nome']);
		$rg       =  e($_POST['rg']);
		$datanasc       =  e($_POST['datanasc']);
		$email       =  e($_POST['email']);
		$username    =  e($_POST['username']);
		$password_1  =  e($_POST['password_1']);
		$password_2  =  e($_POST['password_2']);

		// validação de formulário
		if ($password_1 != $password_2) {
			array_push($errors, "As senhas não coincidem");
		}

		// registrar usuário se não houver erros no formulário
		if (count($errors) == 0) {
			$password = md5($password_1);//criptografar a senha antes de salvar no banco de dados
			$query = "INSERT INTO user (matricula, nivel, cpf, nome, rg, datanasc, email, username, password) VALUES ('$matricula', '$nivel', '$cpf', '$nome', '$rg','$datanasc', '$email', '$username', '$password')";
			mysqli_query($db, $query);
			// obtenha o id do usuário criado
			$logged_in_user_id = mysqli_insert_id($db);

			$_SESSION['user'] = getUserById($logged_in_user_id); // colocar usuário logado na sessão
			$_SESSION['success']  = "Agora você está logado";
			header('location: eventos.php');
		}
	}

		// REGISTER ADM
	function registerAdm() {
		global $db, $errors, $tipo;

		// recebe todos os valores de entrada do formulário
		$matricula       =  e($_POST['matricula']);
		$cpf       =  e($_POST['cpf']);
		$nome       =  e($_POST['nome']);
		$email       =  e($_POST['email']);
		$username    =  e($_POST['username']);
		$password_1  =  e($_POST['password_1']);
		$password_2  =  e($_POST['password_2']);

		// validação de formulário
		if ($password_1 != $password_2) {
			array_push($errors, "As senha não coincidem");
		}


		// registrar usuário se não houver erros no formulário
		if (count($errors) == 0) {
			$password = md5($password_1);//criptografar a senha antes de salvar no banco de dados
			$query1 = "INSERT INTO admin (matricula,cpf, nome, email, username, password) VALUES ('$matricula', '$cpf', '$nome', '$email', '$username', '$password')";
			$result= mysqli_query($db, $query1);

			// obtenha o id do usuário criado
			$logged_in_user_id = mysqli_insert_id($db);

			$_SESSION['user'] = getUserById($logged_in_user_id); // colocar usuário logado na sessão
			$_SESSION['success']  = "Agora você está logado";
			header('location: adm.php');
		}
		else {
			echo 'ERRO';
		}
	}

	// Retorna a matriz do usuário de seu id
	function getUserById($id){
		global $db;
		$query2 = "SELECT * FROM user, admin WHERE id=" . $id;
		$result = mysqli_query($db, $query2);
		$user = mysqli_fetch_assoc($result);
		return $user;
	}

	// LOGIN USER
	function login(){
		global $db, $username, $errors;

		// valores de forma de grap
		$username = e($_POST['username']);
		$password = e($_POST['password']);

		// verifique se o formulário está preenchido corretamente
		if (empty($username)) {
			array_push($errors, "É necessário um usuário");
		}
		if (empty($password)) {
			array_push($errors, "É necessário uma senha");
		}

		// tentativa de login se não houver erros no formulário
		if (count($errors) == 0) {
			$password = md5($password);

			$query3 = "SELECT * FROM admin WHERE username='$username' AND password='$password' LIMIT 1";
			$result = mysqli_query($db, $query3);
			$logged_in_user_id = mysqli_insert_id($db);

			if (mysqli_num_rows($result) == 1) { // usuário encontrado
					$logged_in_user = mysqli_fetch_assoc($result);
					$_SESSION['user'] = $logged_in_user;
					$_SESSION['success']  = "Agora você está logado";
					header('location: adm.php');		  
				} else  {
					$query3 = "SELECT * FROM user WHERE username='$username' AND password='$password' LIMIT 1";
					$result = mysqli_query($db, $query3);
					$logged_in_user_id = mysqli_insert_id($db);

					if (mysqli_num_rows($result) == 1) {
						$logged_in_user = mysqli_fetch_assoc($result);
						$_SESSION['user'] = $logged_in_user;
						$_SESSION['success']  = "Agora você está logado";
						header('location: index.php');
					} else {
				array_push($errors, "Usuário e Senha não combinam");
					}
				} 
		}
	}

	function isLoggedIn()
	{
		if (isset($_SESSION['user'])) {
			return true;
		} else{
			return false;
		}
	}
	function isAdmin()
	{
		global $db, $logged_in_user;

			$query4 = "SELECT * FROM admin WHERE id=".$logged_in_user.'id';
			$result = mysqli_query($db, $query4);
			
			if (mysqli_num_rows($result) == 1) {
				return true;
			} else {
				return false;
			}
	}
	// escape string
	function e($val){
		global $db;
		return mysqli_real_escape_string($db, trim($val));
	}
	function display_error() {
		global $errors;
		if (count($errors) > 0) {
			echo '<div class="error">';
				foreach ($errors as $error) {
					echo $error .'<br>';
				}
			echo '</div>';
		}
	}
?>