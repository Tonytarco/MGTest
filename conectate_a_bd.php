<?php 
$servidor = "localhost";
$basededatos = "mgtest"; 
$usuario = "root";
$pasword = "";

$conexion = new mysqli($servidor,$usuario,$pasword,$basededatos);
if ($conexion->connect_error){
echo "No se ha podido realizar la conexion, intentelo de nuevo";
exit();	
}else if (!mysqli_select_db($conexion, $basededatos)) 
  {
    echo "Error al conectar al servidor de BD, no existe la base de datos (catágo).<br/>";
    exit();
  } 
  else 
  {
    if (!mysqli_set_charset($conexion, "utf8")) 
    {
      printf("Error cargando el conjunto de caracteres utf8: %s\n", mysqli_error($conexion));
      exit();
    }
  }
  return $conexion;
	
?>