<?php 
 ?>
<!DOCTYPE html>
<html lang="es">
<head>
     <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <link rel="stylesheet" href="css/estiloshistorial.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <title>Consultar datos</title>
   
    <link rel="stylesheet" href="vistas/css/estiloshome.css">
</head>
<body class="fondohome">
   <div id="menu"> 
    <ul> 
      <li><a href="#">Consulta fechas</a></li> 
      <li><a href="../index.php">formulario</a></li> 
      <li><a href="../includes/logout.php">Cerrar Sesion</a></li> 
      <li><a href="#">Contacto</a></li> 
    </ul> 
  </div> 
    <section>
          <!-- aca va el biemvenido opcional -->
    </section>
    <nav style="background-color:#00796b;">
      <center>
            <h1 style="color:white;">LISTADO DE DATOS</h1>
      </center>
    </nav>
    
<center>
    <table class="table">
        <thead class="thead-dark">
          <tr>
           <th scope="col">Nro</th>
            <th scope="col">Estado</th>
            <th scope="col">Carrera</th>
            <th scope="col">Materia</th>
            <th scope="col">Fecha inscripci&oacute;n</th>
            <th scope="col">Turno</th>
            <th scope="col">Fecha Parcial</th>
            <th scope="col">Correo</th>
            <th scope="col"></th>
            <th scope="col"></th>
          </tr>
        </thead>
       <tbody id="datos">
        <?php
         include ('../includes/funciones.php');                  
              session_start();         
         $alumno= $_SESSION['vardni'];
         $res= selectinscrip($alumno);
         while ($row= mysqli_fetch_array($res)){ ?>
              
         <tr>
          <td><?php echo $row['id']; ?> </td>
          <td><?php if ("Apto"== $row['estado']) {
            echo $row['estado'];
          }else{ echo "En espera...";} ?> </td>
          <?php $lala= mostrarhistorial($row['id_materia']); ?>
          <td><?php echo $lala[0]; ?> </td>
          <td><?php echo $lala[1]; ?> </td>
          <td><?php echo date("Y-m-d",strtotime($row['fecha_hoy'])); ?> </td>
          <td><?php echo  $row['turno']; ?> </td>
          <td><?php echo  $row['fechafinal']; ?> </td>
          <td><?php echo  $row['email']; ?> </td>
          <td> <a href="modif_prod1.php?no= <?php echo $row['id']?>"> <button type="button" class="btn btn-outline-success">Modificar</button></a></td>
          <td> <a href=""> <button type="button" class="btn btn-outline-danger">Eliminar</button></a></td>
          </tr>
       </tbody>

        <?php
         }
         ?>
      </table>
</center>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>     
</body>
</html>