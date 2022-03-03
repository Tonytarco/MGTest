<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
<link rel="stylesheet" href="css/estilosReporte9.css">	
</head>

<body>
<div class="Report-form">	
		
  <div class="Report-Small">	
     <h2>Noticias</h2> 
     <form action=""  name="reporte"  method="POST" id="reporte">
 
	<table style="margin-top: -5%">
<?php 
if (isset($_POST["OrderBy"]))$OrderBy = $_POST["OrderBy"];else $OrderBy="nombre";
if (isset($_POST["accion"]))$accion = $_POST["accion"];else $accion="";			
if (isset($_POST["emailsel"]))$emailsel = $_POST["emailsel"];else $emailsel="";
if (isset($_POST["nu_tipo_entidad_sta"]))$nu_tipo_entidad_sta = $_POST["nu_tipo_entidad_sta"];else $nu_tipo_entidad_sta="";			
if (isset($_POST["in_clasificacion_tipo_ent_sta"]))$in_clasificacion_tipo_ent_sta = $_POST["in_clasificacion_tipo_ent_sta"];else $in_clasificacion_tipo_ent_sta="";	
		
if ($accion=="Gestionar"){
	
	gestionar_usuario($accion,$emailsel,$nu_tipo_entidad_sta,$in_clasificacion_tipo_ent_sta);
}		
		
		$reporteUserconf=show_reporteNoticias();
		$row_rsdepto=$reporteUserconf[0];
        $result=$reporteUserconf[1];
		$total_rec=$reporteUserconf[2];	
if ($total_rec > 0){	
?>					
			<tr  class="Report-row-header">
				<td width="350px" onClick="Ordenar('nombre');" class="title-report">TITULO
				</td>	
				<td width="150px">ACCION
				</td>	
			</tr>
<?php 	
//include("consultasPC.php");		
 	
$i=1;
$class="";			
 do{
if ($i%2==0)$class="par";
else $class="impar";	 
?>		
			<tr  class="Report-row-<?php echo $class;?>">
				<td width="350px"><?php echo $row_rsdepto['titulo'];?>
				</td>	
				<td width="150px">
				<button type="button" onClick="" class="btnOksmall">Ver más</button>
	
				</td>	
			</tr>

		
<?php 
	 $i++;
 	}while (($row_rsdepto = mysqli_fetch_assoc($result)) && $i<5);
}
	while($i<=5){ ?>	
	<tr>
	  <td colspan="2">&nbsp;
	  </td>	
	</tr>
		<?php $i++;}
          ?>	
		
		</table>
<input name="accion"  value="<?php echo $accion?>" type="hidden"></input> 	
<input name="OrderBy"  value="<?php echo $OrderBy?>" type="hidden"></input> 
<input name="emailsel"  value="<?php echo $emailsel?>" type="hidden"></input> 
<input name="nu_tipo_entidad_sta"  value="<?php echo $nu_tipo_entidad_sta?>" type="hidden"></input> 
<input name="in_clasificacion_tipo_ent_sta"  value="<?php echo $in_clasificacion_tipo_ent_sta?>" type="hidden"></input> 	
</form>		
<script src="js/ValidarEntradas3.js"></script>  
<script src = " https://unpkg.com/sweetalert/dist/sweetalert.min.js " ></script>
<div>	
</div>	
</body>
</html>