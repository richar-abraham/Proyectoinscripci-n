<?php 
	//validar que existe el usuario
	include 'dab.php';

	class User extends DaB{
		private $nombre;
		private $username;
		public $dni;

		public function userExists($user, $pass){
			//me va a validar si existe el usuario
  		$query = $this->connect()->prepare('SELECT * FROM alumnos WHERE Apellido = :user AND dni = :pass');
  		$query->execute(array('user' => $user, 'pass' => $pass));
        
			if ($query->rowCount()) {
				return true;

			}else{
				return false;
			}
		}
		public function setUser($user, $pass){
			   //vamos a asignar un usuario
			 $query = $this->connect()->prepare('SELECT * FROM alumnos WHERE Apellido = :user AND dni = :pass');
				$query->execute(array('user' => $user, 'pass' => $pass));		
			
			foreach ($query as $currentUser ) {
				$this->nombre = $currentUser['Nombre'];
				$this->username = $currentUser['Apellido'];
				$this->dni = $currentUser['dni'];
			}
		}

			public function getNombre(){
				return $this->nombre; 
			}
			public function getapellido(){
				return $this->username;
			}
			public function getdni(){
				return $this->dni;		
			}

			public function carrera(){
		 	 $query = $this->connect()->prepare('SELECT * FROM carreras');
		 		$query->execute();
		 		return $query;
		 	}
		 	public function pruebar (){
		 		  $query = $this->connect('SELECT * FROM carreras');
		 		  //$resultado=$conexion->query($squery);
		 		  return $query;
		 	}
		 	
	}
 ?>