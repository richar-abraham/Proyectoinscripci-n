<?php
	include '../includes/funciones.php';
if (isset($_POST['sobreescribir'])) {
		
	  		
	  		$no=$_POST['no'];
	  		$carrera=$_POST['lista1'];
	  		$materia=$_POST['lista2'];	  		
	  		$turno=$_POST['turno'];	  		
	  		$fechafinal=$_POST['fechafinal'];
	  		$mail=$_POST['Email'];
	  		$telefono=$_POST['telefono'];
	  		$estado=$_POST['estado'];

	  		
	  		if ($estado =="Apto") {
	  			echo "<script>alert('Las modificaciones solo se pueden realizar antes de que secretaria te haya calificado como Apto.  ')</script>";
                        echo "<script> setTimeout(\"location.href='../index.php'\",1000)</script>";
	  		}elseif ($estado ==null) {
	  			Modificarinscripcion($no, $carrera, $materia,$turno, $fechafinal, $mail, $telefono);
	  		 echo "<script>alert('Se actualizo exitosamente')</script>";
                        echo "<script> setTimeout(\"location.href='../index.php'\",1000)</script>";
	  		}elseif ($estado == "No apto") {
	  			echo "<script>alert('Las modificaciones se pueden realizar antes de que secretaria te haya calificado como No Apto.  ')</script>";
                        echo "<script> setTimeout(\"location.href='../index.php'\",1000)</script>";
	  		}

	  		
}
	//

	
?>

