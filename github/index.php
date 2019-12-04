<?php 
	
	include 'includes/user.php';
	include 'includes/user_session.php';

	$userSession = new UserSession(); //el objeto de la clase sesion para validar si hay sesiones
	$user = new User ();

	if (isset($_SESSION['user'])) { //verifica si hay sesion		
		$user->setUser($userSession->getCurrentUser(), $_SESSION['pass']); //esto se activa cuando no cerre sesion y me manda al formulario. devuelve la sesion de getuser y se pasa a setuser hace la conexion a la base de datos  y rellena las variables
		include_once 'vistas/homeins.php';

	}else if (isset($_POST['username']) && isset($_POST['password'])) {
		//verifica la validacion de login de entrada de datos
		$userForm = $_POST['username'];
		$passForm = $_POST['password'];


		$user = new User();
		if ($user->userExists($userForm, $passForm)){
			//userExist entra a la base se datos y valida el usuario y password regresa V o F
			$userSession->setCurrentUser($userForm, $passForm);//guardo mi sesion  en la funcion 
			$user->setUser($userForm, $passForm);//llena los datos de user.php. y el objeto tiene los datos
			include_once 'vistas/homeins.php';
		} else{ //admin
						
			$errorLogin = "Usuario  y/o contrase&ntilde;a incorrecta" ;
			include_once 'vistas/login.html';

	   	 }
	}else{
	
		  include 'vistas/login.html';
		
	}
              
 ?>