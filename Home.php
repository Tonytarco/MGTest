<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/estilosis13.css">
	<link rel="stylesheet" href="css/stylemensaje2.css">
	       
</head>
<body>
<?php 
session_start();
if (isset($_SESSION["SesionLive"]))header("Location: inicio.php");
else {
?>	
    <form action="" name="clientes" method="POST" id="form">
        <div class="form">
		<?php	
if (isset($_POST["Enterprise"]))$enterprise = $_POST["Enterprise"];else $enterprise="";	    
if (isset($_POST["accion"]))$accion = $_POST["accion"];else $accion="";		
if (isset($_POST["username"]))$username = $_POST["username"];else $username="";					
if (isset($_POST["password"]))$password = $_POST["password"];else $password="";				
	
if ($accion=="consulta")
{
 include("consultas.php");

 $rowrsdepto2=verificar_acceso($username,$password,$enterprise);
	    $row_rsdepto2=$rowrsdepto2[0];
		if($rowrsdepto2[1] > 0){ /*****si esta autorizado verificamos que este activo***************/
	    if ($row_rsdepto2['nu_tipo_entidad_sta']==2 && $row_rsdepto2['in_clasificacion_tipo_ent_sta']=='INC'){
		    $mensaje="Usuario registrado pero inactivo";
     ?> 
	<p class="mensaje"><?php echo $mensaje?></p>		
	<?php	}		
		else if ($row_rsdepto2['nu_tipo_entidad_sta']==4 && $row_rsdepto2['in_clasificacion_tipo_ent_sta']=='RCH'){
		    $mensaje="Su solicitud ha sido rechazada";
     ?> 
	<p class="mensaje"><?php echo $mensaje?></p>		
	<?php	}				
		 else 
		{
		$nombre=$row_rsdepto2['nombre'];	
        $apellido=$row_rsdepto2['apellido'];
        $dni=$row_rsdepto2['dniuser'];
		$nu_tipo_entidad_doc=$row_rsdepto2['nu_tipo_entidad_docuser'];	
	    $in_clasificacion_tipo_ent_doc=$row_rsdepto2['in_clasificacion_tipo_ent_docuser'];	
 			
        $dni_enterprise=$row_rsdepto2['dni_enterprise'];
		$nu_tipo_entidad_doc_ent=$row_rsdepto2['nu_tipo_entidad_doc_ent']; $in_clasificacion_tipo_ent_doc_ent=$row_rsdepto2['in_clasificacion_tipo_ent_doc_ent'];	
		
		$_SESSION['dni_enterprise'] = $dni_enterprise;		
		$_SESSION['nu_tipo_entidad_doc_ent'] = $nu_tipo_entidad_doc_ent;	
		$_SESSION['in_clasificacion_tipo_ent_doc_ent'] = $in_clasificacion_tipo_ent_doc_ent;	
		$_SESSION['name_comp_ent'] = 'Milenium Group';	 
/************Datos del usuario empleado de la empresa que inicia sesion**********/			
        $_SESSION['name_user'] = $nombre;
		$_SESSION['lastname_user'] = $apellido;
		$_SESSION['dni_user'] = $dni;		
		$_SESSION['nu_tipo_entidad_doc_user'] = $nu_tipo_entidad_doc;	
		$_SESSION['in_clasificacion_tipo_ent_doc_user'] = $in_clasificacion_tipo_ent_doc;	
/*******************************************************************************************/	
		$_SESSION['SesionLive']=$dni_enterprise.$nu_tipo_entidad_doc_ent.$in_clasificacion_tipo_ent_doc_ent.$dni.$nu_tipo_entidad_doc.$in_clasificacion_tipo_ent_doc;	
		
        header("Location: Dashboard.php");	
		}
		  }else /*****si no esta autorizado debe volverlo a intentar***************/
		  {$mensaje="Usuario ó Contraseña Invalidos";
?> 
	<p class="mensaje"><?php echo $mensaje?></p>		
	<?php	}
 }else {if (isset($_GET["msg"]))$msg = $_GET["msg"];else $msg="";				
	if ($msg=="caducada"){
    $mensaje="Su Sesion ha caducado, debe volver a Iniciarla..!";
  		?> 		
	<p class="mensaje"><?php echo $mensaje?></p>		
    <?php }}?>
			<div align="center"><img src="Imagenes/home4.png" width="60%"></div>	
	         <div class="grupo">
                <input type="text" name="username" id="username" value="<?php echo $username?>" required><span class="barra"></span>
                <label for="">E-mail</label>
            </div>
            <div class="grupo">
                <input type="password" name="password" id="password" value="<?php echo $password?>" autocomplete="off" required><span class="barra"></span>
                <label for="">Contraseña</label>
            </div>
            <div class="grupo"></div>

            <button type="button" onClick="f_validar('logueo')">Guardar</button>
			<p class="texto">¿Aún no tienes cuenta?<a class="linke" href="Registro.php"> Registrate</a></p>
        </div>
<input name="accion"  value="<?php echo $accion?>" type="hidden"></input> 	
<input name="TipodePersona"  value="<?php echo "1-PNT"?>" type="hidden"></input> 	
    </form>
    <script src="main.js"></script>
<script src="js/ValidarEntradas.js">
</script>  
<script src = " https://unpkg.com/sweetalert/dist/sweetalert.min.js " ></script>
<?php }	?>
</body>
</html>