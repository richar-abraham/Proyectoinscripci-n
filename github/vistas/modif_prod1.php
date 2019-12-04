<?php
  include '../includes/funciones.php';
  
  $consulta=Consultarinsmo($_GET['no']);

?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Modificar Datos</title>
<style type="text/css">
@import url("css/mycss.css");
</style>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
 <link rel="stylesheet" href="css/estilosmodif.css">
 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">

  <script src="//code.jquery.com/jquery-1.12.4.js"></script>
  <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
      $(function(){
        $("#fechafinal").datepicker({
            dateFormat: "yy-mm-dd",
            changeMonth:true,
            changeYear:true,  
             dayNames: [ "Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado" ],
         monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ],
         monthNamesShort: [ "Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
         dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ],
         
         beforeShowDay:$.datepicker.noWeekends  
            })
       })
    </script>

</head>
<body>
   <div id="menu"> 
    <ul> 
     <li><a href="historial.php">Historial de Ins</a></li> 
      <li><a href="../index.php">formulario</a></li> 
      <li><a href="../includes/logout.php">Cerrar Sesion</a></li>        
    </ul> 
  </div>
<div class="todo">
  
  <div id="cabecera">
    <img src="img/swirl.png" width="1000" id="img1">
  </div>
  
  <div id="contenido">
  	<div style="margin: auto;  width: 800px; border-collapse: separate; border-spacing: 10px 5px;">
  		<span> <h1 style="margin-left: 10px;">Modificar Datos</h1 > </span>
  		<br>
	  <form action="modif_prod2.php" method="POST" style="border-collapse: separate; border-spacing: 10px 5px;">
      <input type="hidden" name="no" value="<?php echo $_GET['no']?>">
        <?php include_once ('../includes/funciones.php'); $lala= mostrarhistorial($consulta[1]); ?>
  		<label id="inputs">Carrera: </label>
       <select id="lista1" name="lista1">
              <option disabled selected> seleccione </option>
                <?php                    
                   // session_start();
                    //$_SESSION['vardni']=$user->getdni();
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
  		

  		<div id="select2lista"></div>  
      

      <label id="inputs">Turno: </label>      
        <select name="turno" id="datos">
             
             <option value="Mañana">Ma&ntilde;ana</option>
             <option value="Noche">Noche</option>          
        </select>
      <br>
      <label id="inputs">Fecha final: </label>
      <input type="text" id="fechafinal" name="fechafinal" value="<?php echo $consulta[3] ?>"><br>
      <label id="inputs">Email: </label>
      <input type="text" id="Email" name="Email" value="<?php echo $consulta[4] ?>"><br>

      <label id="inputs">Telefono: </label>
      <input type="number" id="telefono" name="telefono"; value="<?php echo $consulta[5] ?>" ><br>
  		<input type="hidden" name="estado" value="<?php echo $consulta[6]?>">
  		<br>
  		<input type="submit" class="btn btn-success" name="sobreescribir" value ="Guardar">
      <a href="../index.php" class="btn btn-danger">cancelar</a>
     </form>
  	</div>
  </div>

	<div id="footer">
  <img src="img/swirl2.png" id="img2">
  	</div>
</div>
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
      url:"../includes/datos.php",
      data:"idcero=" + $('#lista1').val(),
      success:function(r){
        $('#select2lista').html(r);
      }
    });
  }
</script>
</body>
</html>