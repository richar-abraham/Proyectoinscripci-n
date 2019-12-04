<?php 
	function db(){
	$dominio= "host";
    $user="usuarioejemplo";
    $password="ejemplo";
    $db = "bd_inscripcion01";

    $conexion= new mysqli($dominio,$user,$password,$db);
    if ($conexion->connect_error) {
        die("conexion fallida: " . $conexion->error);
    }else{}
    $conexion->set_charset("utf8");
	return $conexion;
	}
     
	 function selectcarreras(){
	 		
	 		$sql="SELECT * FROM carreras";
			$conexo= db();
			$resultado=  $conexo->query($sql);			
		return $resultado;
	
	}
	function insertardatos($idalumno,$dni,$carrera,$materia,$fecha,$turno,$fechafinal,$mail,$telefono){
		$sql="INSERT INTO inscripciones(id_alumno,dni,id_carrera,id_materia,fecha_hoy,turno,fechafinal,email,telefono)
					VALUES ('$idalumno','$dni','$carrera','$materia','$fecha','$turno','$fechafinal','$mail','$telefono') ";
				#$resultado=$conexion->query($sql);
				$conexo= db();
				if ($conexo->query($sql)=== true){
									
				}else{
	  				echo "error al insertar";
	  			}
	}

  function comprobarinscrip($dni, $carrera, $materia, $fecha){      
      $verific = "SELECT * FROM inscripciones WHERE id_alumno = '$dni' and id_carrera = '$carrera' and id_materia = '$materia' and fechafinal ='$fecha'";
      $verfi = db();
      $query4= $verfi->query($verific);
    
     if ($query4->num_rows >0) {
      
        return true;

      }else{
        return false;
      }
  }
 

	function selectinscrip ($codigo){
		$consultar ="SELECT * FROM inscripciones WHERE dni=$codigo";
		$conexo= db();
		$resultado=  $conexo->query($consultar);	
		return $resultado;
	}


  function Consultarinsmo($no_prod){
  	 $conexion = db();     
    $sentencia="SELECT * FROM inscripciones WHERE id=$no_prod ";
    $resultado=mysqli_query($conexion, $sentencia) or die (mysql_error());
     while ($filas= mysqli_fetch_array($resultado)) {
      $fila = array(      
      $filas['id_carrera'],
      $filas['id_materia'],
      $filas['turno'],
      $filas['fechafinal'],
      $filas['email'],
      $filas['telefono'],
       $filas['estado']

    ); 
    }   
    return $fila;    
  }
  
  function mostrarhistorial($materia){
  	$conectado= db();
    $query1= "SELECT ca.nombre as nombreca, ma.nombre from carreras as ca inner join materias    as ma on ma.id_carrera = ca.id
        where ma.id= $materia"; 
    $resultado= mysqli_query($conectado, $query1);
     
    while ($filas= mysqli_fetch_array($resultado)) {
      $fila = array($filas['nombreca'], $filas['nombre']); 
    }
   
    return $fila;
  }
function Modificarinscripcion($id, $carrera,$materia,$turno,$fechafinal,$mail,$telefono)
  {$conexao= db();
    $sentencia="UPDATE inscripciones SET id_carrera='$carrera', id_materia= '$materia', fechafinal='$fechafinal', email='$mail', telefono = '$telefono' WHERE id='$id' ";
     
   
        if ($conexao->query($sentencia)=== true){
                  
        }else{
            echo "error al insertar";
          }
  }

 ?>