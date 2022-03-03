<!doctype html>
<html>
<head>

<meta charset="utf-8">
<title>Documento sin título</title>
<script src = " https://unpkg.com/sweetalert/dist/sweetalert.min.js " ></script>	
</head>
		
<body>
<?php 

function insertar_noticia($accion,$titulo,$medio,$fecha,$descripcion){

if($accion=="RegistrarNoticia"){	
include("conectate_a_bd.php");	

$errortabla="";	
$sql="insert into noticia Values('".$titulo."','".$medio."','".$fecha."','".$descripcion."')"; 
$result=mysqli_query($conexion,$sql);
if (!$result)$errortabla="Noticia";		

//echo "sql= ".$sql;

 if ($errortabla==""){ 	?>
<script>	
 swal({
  title: "Felicidades!",
  text: "Se ha Registrado Satisfactoriamente!",
  icon: "success",
  })
.then((willSave) => {
  if (willSave) {
  window.location="Dashboard.php";  
  } 
});	

</script>	
	<?php return true;}else { ?>
<script>	
swal({
  title: "Error de Registro !",
  text: "Ha ocurrido un problema, error numero: "+"<?php echo mysqli_errno($conexion) ?>"+" al intentar registrar "+"<?php echo $errortabla?>"+"..!", 
  icon: "error",
  button: "ok"
});

</script>		 
<?php      } 	
$conexion=null;
$sql=null;	
  }	
 return false;
 		  

}	
	
	
	
function gestionar_usuario($accion,$email,$nu_tipo_entidad_sta,$in_clasificacion_tipo_ent_sta){
if($accion=="Gestionar"){	
include("conectate_a_bd.php");	

$errortabla="";	
$sql="Update usuario set nu_tipo_entidad_sta=".$nu_tipo_entidad_sta.",  
                         in_clasificacion_tipo_ent_sta='".$in_clasificacion_tipo_ent_sta."'
				where emailuser='".$email."'";
	  $result=mysqli_query($conexion,$sql);
if (!$result)$errortabla="Usuario";		
//echo "sql= ".$sql;
 if ($errortabla==""){ 	?>
<script>	
 swal({
  title: "Felicidades!",
  text: "Se ha Actualizado Satisfactoriamente..!",
  icon: "success",
  })
then((willSave) => {
  if (willSave) {
    
  } 
});	

</script>	
	<?php return true;}else { ?>
<script>	
swal({
  title: "Error de Actualizacion !",
  text: "Ha ocurrido un problema, error numero: "+"<?php echo mysqli_errno($conexion) ?>"+" al intentar Actualizar "+"<?php echo $errortabla?>"+"..!", 
  icon: "error",
  button: "ok"
});

</script>		 
<?php return false;     } 	
$conexion=null;
$sql=null;	
  		  	
  }
}
function insertar_record($accion,$dni_enterprise,$nu_tipo_entidad_doc_ent,$in_clasificacion_tipo_ent_doc_ent){

if($accion=="registrarusuarioP1"){	
$errortabla="";	
	
include("conectate_a_bd.php");	
$cant_char=9;	
$deltabla=substr($accion,9,$cant_char)." ".substr($accion,9,2);	
if (isset($_POST["name"]))$name = $_POST["name"];else $name ="";	
if (isset($_POST["username"]))$username = $_POST["username"];else $username = "";		
if (isset($_POST["password"]))$password = $_POST["password"];else $password = "";	

$errortabla="";	
$tabla="";	
include("consultas.php");	
$rowrsdepto2=buscar_record("consulta",'usuario','J-403961441',7,'RIF',$username);	
$row_rsdepto2=$rowrsdepto2[0];
if($rowrsdepto2[1] == 0){		
$sql="insert into persona Values('No dio',1,'CDC','".$name."','','','','','".$username."')"; 
$result=mysqli_query($conexion,$sql);
if (!$result)$errortabla="Persona";		
//echo "sql= ".$sql;	

	
$tabla='usuario';
if ($tabla=="usuario"){	

$sql="insert into ".$tabla."  
      Values('No dio',1,'CDC','".$username."','".$username."',	  '".$password."',NULL,'',default,default,'J-403961441',7,'RIF')";
	  $result=mysqli_query($conexion,$sql);
if (!$result)$errortabla="Usuario";	}	

//echo "sql= ".$sql;

//include("desconectate_de_bd.php");
//echo "sdsds".$errortabla;	
 if ($errortabla==""){ 	?>
<script>	
 swal({
  title: "Felicidades!",
  text: "Se ha Registrado Satisfactoriamente!, Su estatus esta pendiente de aprobacion",
  icon: "success",
  })
.then((willSave) => {
  if (willSave) {
  window.location="Home.php";  
  } 
});	

</script>	
	<?php return true;}else { ?>
<script>	
swal({
  title: "Error de Registro !",
  text: "Ha ocurrido un problema, error numero: "+"<?php echo mysqli_errno($conexion) ?>"+" al intentar registrar "+"<?php echo $errortabla?>"+"..!", 
  icon: "error",
  button: "ok"
});

</script>		 
<?php      } 	
$conexion=null;
$sql=null;	}
  }	
 return false;
 		  

}	

	?>  
</body>
</html>