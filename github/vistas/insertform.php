<?php 
		
	  		include '../includes/funciones.php';
	  		include '../includes/user.php';

			$user = new User ();

	  		date_default_timezone_set('America/Argentina/Buenos_Aires');
			$fecha =date('Y-m-d', time());
			//$fecha=date("Y-m-d",strtotime('$time'));
	  		
	  	if (isset($_POST['turno']) && !empty($_POST['fechafinal'])&& !empty($_POST['email']) ) {
	  			
	  		$idalumno= $_POST['dni'];
	  		$dni=$_POST['dni'];
	  		$carrera=$_POST['lista1'];
	  		$materia=$_POST['lista2'];	  		
	  		$turno=$_POST['turno'];	  		
	  		$fechafinal=$_POST['fechafinal'];
	  		$mail=$_POST['email'];
	  		$telefono=$_POST['telefono'];

	  		
	  		$valores = explode('-', $fechafinal);	

	  		if ((count($valores)) == 3) {
	  			if (checkdate($valores[1], $valores[0], $valores[2])) {
	  				if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
	  					if (is_numeric($telefono)) {
	  						
	  					if (comprobarinscrip($dni, $carrera, $materia, $fechafinal2)){
	  			echo "<script>alert('Usted ya tiene una inscripción hecha con la misma fecha, carrera y materia')</script>";
                echo "<script> setTimeout(\"location.href='../index.php'\",1000)</script>";
               } else{$fechafinal2= $valores[2]."-".$valores[1]."-".$valores[0];
	  			insertardatos($idalumno,$dni,$carrera,$materia,$fecha,$turno,$fechafinal2,$mail,$telefono);
	  			$cm= mostrarhistorial($materia);
			if (!empty($_POST['nombre']) && !empty($_POST['email'])) {
				$name=$_POST['nombre'];
				$asunto= 'Incripcion a materias';
				$email = $_POST['email'];
                $mensaje = "Usted se encuentra en proceso de inscripción"."\n".
                		"Para el dia: $fechafinal"."\n".
                		"Para la carrera: $cm[0]"."\n".
                		"Para la materia: $cm[1]";

				$header= "From: norenviar@ista.com.ar" . "\r\n";
				$header.= "Reply-to: norenviar@ista.com.ar" . "\r\n";
				$header.= "X-Mailer: PHP/" . phpversion();
				
				$mail= mail($email,$asunto,$mensaje,$header);
				if($mail){					
					session_start();
					$_SESSION['varmail']=$_POST['email'];
					$_SESSION['vartel']=$_POST['telefono'];
                    	 echo "<script>alert('formulario enviado exitosamente')</script>";
                        echo "<script> setTimeout(\"location.href='../index.php'\",1000)</script>";

              	 }else {echo "error de envio";}				
			   }
			   }	
	  					}else{ echo "<script>alert('Ingrese un telefono valido')</script>";
                         echo "<script> setTimeout(\"location.href='../index.php'\",1000)</script>";}
	  				}else{ echo "<script>alert('Ingrese un mail valido')</script>";
                         echo "<script> setTimeout(\"location.href='../index.php'\",1000)</script>";}
	  			}else{ echo "<script>alert('Ingrese una fecha correcta')</script>";
                         echo "<script> setTimeout(\"location.href='../index.php'\",1000)</script>";}	  		
	  		}else{ echo "<script>alert('Ingrese una fecha correcta')</script>";
                         echo "<script> setTimeout(\"location.href='../index.php'\",1000)</script>";}
	  		
	  	}else{	echo "<script>alert('error al enviar formulario')</script>";
                echo "<script> setTimeout(\"location.href='../index.php'\",1000)</script>";	}
	   			
?>
