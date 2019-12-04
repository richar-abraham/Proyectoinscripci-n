<?php 

$conexion=mysqli_connect('ejemplo','usuarioejemplo','ejemplo','bd_inscripcion01');
$idcero=$_POST['idcero'];

	$sql="SELECT id,nombre,
			 id_carrera 
		from materias 
		where id_carrera='$idcero'";
$conexion->set_charset("utf8");
	$result=mysqli_query($conexion,$sql);

	$cadena="<label> Materias: </label> <br>
			<select id='lista2' name='lista2'>";

	while ($ver=mysqli_fetch_row($result)) {
		$cadena=$cadena.'<option value=' .$ver[0] .'>'. $ver[1] .'</option>';
	}

	echo  $cadena."</select>";
?>