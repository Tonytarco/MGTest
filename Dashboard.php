<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
 <link rel="stylesheet" href="css/styleinicio10.css">
</head>

<body>
<?php session_start();

	if (isset($_SESSION["SesionLive"])){
	?>	
 <div>	
<?php $autorizado='Yes';
include('header.php');	?>
</div>
 <div class="title">DASHBOARD	
</div>		
<table style="border: none">
	<tr>
   <td class="izquierda" width="620px">
<?php  
		include('Aprobar_Usuarios.php');	?>	 
    </td>	
   <td class="derecha" width="600px">	 
 <?php  
		include('Noticias.php');	?>	
	</td>   
   </tr>
	
	<tr>
   <td colspan="2">
<?php  
		include('crearnoticias.php');	?>	 
    </td>	
    </tr>	
</table>	
<div>
<?php  $inicio='Yes';
		include('footer.php');	?>	
</div>	
<?php }else{
header("Location: Home.php");		
	}	?>	

<script> </script>
	
</body>
</html>	