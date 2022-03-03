
<?php 
function show_reporteUsers($OrderBy){
include("conectate_a_bd.php");		 
$sql2="SELECT p.nombre,u.emailuser 
       from persona p, usuario u
	   where p.email=u.emailuser and 
	         u.nu_tipo_entidad_sta!=1 and 
			 u.in_clasificacion_tipo_ent_sta!='ACT' 
	   Order By ".$OrderBy;
//echo $sql2;
$result2 = mysqli_query($conexion,$sql2);
$row_rsdepto2 = mysqli_fetch_assoc($result2); 
$totalRows_rsdepto2 = mysqli_num_rows($result2);
	 
return array ($row_rsdepto2,$result2,$totalRows_rsdepto2);	 	
}

function show_reporteNoticias(){
include("conectate_a_bd.php");		 
$sql2="SELECT titulo 
       from noticia";
//echo $sql2;
$result2 = mysqli_query($conexion,$sql2);
$row_rsdepto2 = mysqli_fetch_assoc($result2); 
$totalRows_rsdepto2 = mysqli_num_rows($result2);
	 
return array ($row_rsdepto2,$result2,$totalRows_rsdepto2);	 	
}
function buscar_record($accion,$tabla,$dni_enterprise,$nu_tipo_entidad_doc_ent,$in_clasificacion_tipo_ent_doc_ent,$username){

if ($accion=="consulta"){
include("conectate_a_bd.php");	
//echo $_POST['TipodeDocumento'];	


//echo $dni_enterprise;	
$sql2="SELECT us.emailuser, us.password,p.nombre 
       FROM usuario us, persona p
        WHERE p.dni=us.dni and
		      p.nu_tipo_entidad_doc=us.nu_tipo_entidad_doc and 
			  p.in_clasificacion_tipo_ent_doc=us.in_clasificacion_tipo_ent_doc and 
		      us.emailuser='".$username."' AND
		      us.dni_enterprise='".$dni_enterprise. "' AND
	          us.nu_tipo_entidad_doc_ent=".$nu_tipo_entidad_doc_ent." AND
		      us.in_clasificacion_tipo_ent_doc_ent='".$in_clasificacion_tipo_ent_doc_ent."'";

$result2 = mysqli_query($conexion,$sql2);
$row_rsdepto2 = mysqli_fetch_assoc($result2);
$totalRows_rsdepto2 = mysqli_num_rows($result2);
//echo $sql2;	
	
if ($totalRows_rsdepto2 > 0){ 
 ?>
<script>	
  
swal({
  title: "<?php echo $tabla?>"+ " registrado",
  text: "El "+"<?php echo $tabla?>"+" con correo: "+"<?php echo $username?>"+" ya se encuentra en nuestra base de datos",
  icon: "warning",
  button: true
  //dangerMode: true,
})

</script>	
	<?php  	
	//echo $row_rsdepto2['dni']; 
	return array ($row_rsdepto2,$totalRows_rsdepto2);   
	
   }
 }
}		
function verificar_acceso($username,$password){
include("conectate_a_bd.php");	

$sql2="select p.nombre, p.apellido, p.dni dniuser, p.nu_tipo_entidad_doc nu_tipo_entidad_docuser, p.in_clasificacion_tipo_ent_doc in_clasificacion_tipo_ent_docuser,u.nu_tipo_entidad_sta, u.in_clasificacion_tipo_ent_sta, e.dni dni_enterprise, e.nu_tipo_entidad_doc nu_tipo_entidad_doc_ent, e.in_clasificacion_tipo_ent_doc in_clasificacion_tipo_ent_doc_ent
from usuario u, persona p, enterprise e 
      where u.dni=p.dni  AND
            u.nu_tipo_entidad_doc=p.nu_tipo_entidad_doc AND
            u.in_clasificacion_tipo_ent_doc= p.in_clasificacion_tipo_ent_doc AND
            u.dni_enterprise=e.dni  AND
            u.nu_tipo_entidad_doc_ent=e.nu_tipo_entidad_doc AND
            u.in_clasificacion_tipo_ent_doc_ent= e.in_clasificacion_tipo_ent_doc AND 
            u.emailuser=p.email AND 
			((u.username='".$username."' AND
            u.password='".$password."') OR 
            (u.emailuser='".$username."' AND
            u.password='".$password."'))";	
	
$result2 = mysqli_query($conexion,$sql2);
$row_rsdepto2 = mysqli_fetch_assoc($result2);
$totalRows_rsdepto2 = mysqli_num_rows($result2);
//echo $sql2;		

return array ($row_rsdepto2,$totalRows_rsdepto2);	
}	?>
<script src = " https://unpkg.com/sweetalert/dist/sweetalert.min.js " ></script>