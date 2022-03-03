<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Footer</title>

	 <link rel="stylesheet" href="css/estilosfooter4.css"> 
  </head>

 <body>
<?php  
 if (isset($_SESSION["SesionLive"])){ 
	   if ($autorizado=='Yes'){ 
$dni_enterprise=$_SESSION['dni_enterprise'];
$nu_tipo_entidad_doc_ent=$_SESSION['nu_tipo_entidad_doc_ent'];
$in_clasificacion_tipo_ent_doc_ent=$_SESSION['in_clasificacion_tipo_ent_doc_ent'];	
$name_comp_ent=$_SESSION['name_comp_ent'];
$nombre=$_SESSION['name_user'];
$Perfil='Usuario Visitante';		   
$apellido=$_SESSION['lastname_user'];		   
$footlabel=" - ".$name_comp_ent." - ".$Perfil." - ".$nombre." - ".$apellido." ";	
 		   
	 ?>  	
										
				<div>				
				<div class="footer" <?php if ($inicio=='Yes'){ ?> style="position: fixed" <?php }?>><p>Copyright &copy; [2022] [MGTest]<?php echo $footlabel ?>| Diseñado por <a href="https://ventasonlinevip.com/" class="a">Ing. Tony Tarco</a></p>
			</div>
			</div>			
<?php }else header("Location: Dashboard.php");
	   }else header("Location: Home.php");	
?> 		
 </body>
</html>