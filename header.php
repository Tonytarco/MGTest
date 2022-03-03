<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Heater</title>

	 <link rel="stylesheet" href="css/estilosheader3.css"> 
  </head>

 <body>
<?php  
 if (isset($_SESSION["SesionLive"])){ 
	   if ($autorizado=='Yes'){ 
 		   
	 ?>  	
			   							
			<div class="header"> 
				 <a href="page6-1-0.php" class="closesesion" style="float: right">
			     <img src="imagenes/profile_close.png" >Cerrar Sesion</a>
				 <img src="Imagenes/logomg.png" width="15%" style="float: left">		
			</div>			
<?php }else header("Location: inicio.php");
	   }else header("Location: iniciosesion.php");	
?> 		
 </body>
</html>