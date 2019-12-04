<?php 
	class UserSession{
		//manejar sesiones. cada vez que creemos una clase de tipo usersesion se inicializa el ambiente
		public function __construct(){
			session_start();
		}
		public function setCurrentUser($user, $pass){
			//me pone un valor a mi sesion actual. pide un usuario y lo guarda
			$_SESSION['user']= $user;
			$_SESSION['pass']= $pass;

		}
		public function getCurrentUser() {
			//devuelvo mi sesion, el valor
			return $_SESSION ['user'];
			
		}		
		public function clossSession(){
			session_unset();
			session_destroy();
		}
	}
 ?>