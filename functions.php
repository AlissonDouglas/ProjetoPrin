<?php 
	session_start();

	// connect to database
	$db = mysqli_connect('localhost', 'root', '', 'multi_login');

	// declarando variaveis
	$username = "";
	$email    = "";
	$errors   = array(); 

	// chamar a função register () se register_btn for click
	if (isset($_POST['register_btn'])) {
		register();
	}

	// chamar a função login () se login_btn for clicado
	if (isset($_POST['login_btn'])) {
		login();
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['user']);
		header("location: ../login.php");
	}

	// REGISTER USER
	function register(){
		global $db, $errors;

		// recebe todos os valores de entrada do formulário
		$username    =  e($_POST['username']);
		$email       =  e($_POST['email']);
		$password_1  =  e($_POST['password_1']);
		$password_2  =  e($_POST['password_2']);

		// validação de formulário: verifique se o formulário está preenchido corretamente
		if (empty($username)) { 
			array_push($errors, "É necessário um Nome"); 
		}
		if (empty($email)) { 
			array_push($errors, "É necessário um Email"); 
		}
		if (empty($password_1)) { 
			array_push($errors, "É necessário uma Senha"); 
		}
		if ($password_1 != $password_2) {
			array_push($errors, "As senhas não combinam.");
		}

		// registrar usuário se não houver erros no formulário
		if (count($errors) == 0) {
			$password = md5($password_1);//criptografar a senha antes de salvar no banco de dados

			if (isset($_POST['user_type'])) {
				$user_type = e($_POST['user_type']);
				$query = "INSERT INTO users (username, email, user_type, password) VALUES('$username', '$email', '$user_type', '$password')";
				mysqli_query($db, $query);
				$_SESSION['success']  = "Novo usuário criado com sucesso !!";
				header('location: adm.php');
			}else{
				$query = "INSERT INTO users (username, email, user_type, password) VALUES('$username', '$email', 'user', '$password')";
				mysqli_query($db, $query);

				// obtenha o id do usuário criado
				$logged_in_user_id = mysqli_insert_id($db);

				$_SESSION['user'] = getUserById($logged_in_user_id); // colocar usuário logado na sessão
				$_SESSION['success']  = "Agora você está logado";
				header('location: index.php');				
			}

		}

	}

	// Retorna a matriz do usuário de seu id
	function getUserById($id){
		global $db;
		$query = "SELECT * FROM users WHERE id=" . $id;
		$result = mysqli_query($db, $query);

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

			$query = "SELECT * FROM users WHERE username='$username' AND password='$password' LIMIT 1";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 1) { // usuário encontrado
				//verificar se o usuário é admin ou usuário
				$logged_in_user = mysqli_fetch_assoc($results);
				if ($logged_in_user['user_type'] == 'admin') {

					$_SESSION['user'] = $logged_in_user;
					$_SESSION['success']  = "Agora você está logado";
					header('location: adm.php');		  
				}else{
					$_SESSION['user'] = $logged_in_user;
					$_SESSION['success']  = "Agora você está logado";

					header('location: index.php');
				}
			}else {
				array_push($errors, "Usuário ou Senha não combinam");
			}
		}
	}

	function isLoggedIn()
	{
		if (isset($_SESSION['user'])) {
			return true;
		}else{
			return false;
		}
	}

	function isAdmin()
	{
		if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin' ) {
			return true;
		}else{
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

		if (count($errors) > 0){
			echo '<div class="error">';
				foreach ($errors as $error){
					echo $error .'<br>';
				}
			echo '</div>';
		}
	}

?>