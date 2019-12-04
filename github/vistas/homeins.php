 <!DOCTYPE html>
<html lang="es">
<head>
 <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Incripciones del alumno</title>
    <link rel="stylesheet" href="vistas/css/estiloshome.css">   
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
     <link rel="stylesheet" href="vistas/datepick/jquery-ui.min.css"> 
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> 
     <link rel="stylesheet" type="text/css" href="vistas/bootstrap-3.3.7-dist/css/bootstrap.css"> 
 
     <script src="vistas/bootstrap-3.3.7-dist/js/bootstrap.js"></script> 

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script> 
    	var nuevoalias = jQuery.noConflict();       
       nuevoalias(document).ready(function(){
       nuevoalias('#myModal').modal('show')
       });
    </script>
</head>    
<body class="fondohome">
  
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header" style="background-color: coral;">
          <h3 class="modal-title" id="exampleModalLongTitle" class="text-danger" >Atención Alumno</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body"> 
          <p>Usted debe encontrarse al dia con las cuotas para poder dar el final de dicha materia.
          De lo contrario no se tomara valida su inscripción.
          Recomendaciones: 
                  Solo se puede inscribir una sola vez para una fecha, carrera y materia.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">He leído y acepto los términos</button>
         
        </div>
      </div>
    </div>
  </div>

  <div id="menu"> 
    <ul> 
      <li><a href="#">Consulta fechas</a></li> 
      <li><a href="vistas/historial.php">Historial de Ins</a></li> 
      <li><a href="includes/logout.php">Cerrar Sesion</a></li> 
      <!-- <li><a href="#">Contacto</a></li>  -->
    </ul> 
  </div> 
  <section>
    <h1>Bienvenido a las inscripciones alumno/a:<br>
      <?php echo $user->getNombre(); ?>
    </h1> 
  </section>
          
  <div class="contenedor">
     <form action="vistas/insertform.php" class="formulario" name="formulario" method="POST">
     <div class="input-group"> 
       <label for="nombre">Nombre/s: </label> <br>
       <input type="text" id="datos" name="nombre" value="<?php echo $user->getNombre(); ?>" readonly>
     </div>
     <div class="input-group">
        <label for="apellido">Apellido/s: </label> <br>
        <input type="text" id="datos" name="apellido" value="<?php echo $user->getApellido();?>"readonly>
     </div>
     <div class="input-group">
       <label for="dni">Dni: </label> <br>
       <input type="number" id="datos" name="dni" value="<?php echo $user->getdni(); ?>"readonly>
     </div>
     <div class="input-group">
        <label for="carrera">Carrera: </label> <br>                    
           <select id="lista1" name="lista1">
              <option disabled selected> Seleccione una opci&oacuten</option>
                <?php 
                    include ('includes/funciones.php');
                    session_start();
                    $_SESSION['vardni']=$user->getdni();
                    $res = selectcarreras();
                     
                    while ($datos= mysqli_fetch_array($res)){                              
                ?>
                    <option value="<?php echo $datos['id']?>">
                      <?php echo  $datos['nombre']; ?>                       
                    </option>
                <?php 
                    } 
                ?>
         </select> 
     </div> 
                
       <div id="select2lista"></div>  
       <div class="input-group">
          <label for="turno">Turno: </label> <br>
          <select name="turno" id="datos">
            <option disabled selected> Seleccione un turno</option>
            <option value="Mañana">Ma&ntilde;ana</option>
            <option value="Noche">Noche</option>          
          </select>
           
       </div>
        <div class="input-group">
           <label for="fecha">Fecha de final: </label> <br>
           <input type="text" id="fechafinalpick" name="fechafinal" placeholder="for example: 16-03-2020">
        </div>
        <div class="input-group">
           <label for="email">Email: </label> <br>
           <input type="email" id="datos" name="email" placeholder="@" required value="<?php session_start(); echo $_SESSION['varmail'];  ?>">
        </div>
        <div class="input-group">
           <label for="telefono">Telefono: </label> <br>
           <input type="number" id="datos" name ="telefono" value="<?php session_start(); echo $_SESSION['vartel']; ?>"> <br>
        </div>
        <input type="submit" id="" class="btn btn-primary btn-lg" value="Enviar">
      </form>
   </div> 
   <script src="vistas/datepick/jquery-es.js"></script> 
   <script  src="vistas/datepick/jquery.js"></script> 
   <script src="vistas/datepick/jquery-ui.min.js"></script>  
  </body>
	<script type="text/javascript">
 	  $(document).ready(function(){
    $('#lista1').val(1);
    recargarLista();

    $('#lista1').change(function(){
      recargarLista();
    });
  })
</script>
<script type="text/javascript">

  function recargarLista(){
    $.ajax({
      type:"POST",
      url:"includes/datos.php",
      data:"idcero=" + $('#lista1').val(),
      success:function(r){
        $('#select2lista').html(r);
      }
    });
  }
</script>
      <script> 
         $(document).ready(function() { 
         $('#fechafinalpick').datepicker({
         dateFormat: "dd-mm-yy",
         
         dayNames: [ "Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado" ],
         monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ],
         monthNamesShort: [ "Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
         dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ],
         
         beforeShowDay:$.datepicker.noWeekends   
          });
         })
      </script>  
</html>
