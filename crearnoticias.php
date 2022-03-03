<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/estilosis16.css">
	
	       
</head>
<body>
<?php 

?>	<div align="center"></div>
    <form action="" name="clientes" method="POST" id="form">
        <div class="form">
		<?php	
if (isset($_POST["Enterprise"]))$enterprise = $_POST["Enterprise"];else $enterprise="";	    
if (isset($_POST["accion"]))$accion = $_POST["accion"];else $accion="";
if (isset($_POST["titulo"]))$titulo = $_POST["titulo"];else $titulo="";		
if (isset($_POST["medio"]))$medio = $_POST["medio"];else $medio="";					
if (isset($_POST["fecha"]))$fecha = $_POST["fecha"];else $fecha="";				
if (isset($_POST["descripcion"]))$descripcion = $_POST["descripcion"];else $descripcion="";				
if ($accion=="RegistrarNoticia")
{
 include("actualizar_datos.php");

 $rowrsdepto2=insertar_noticia($accion,$titulo,$medio,$fecha,$descripcion);
 $row_rsdepto2=$rowrsdepto2[0];
  }?>
			<h2>Crear Noticias</h2>

            <div class="grupo">
                <input type="text" name="titulo" id="titulo" value="<?php echo $titulo?>" required><span class="barra"></span>
                <label for="titulo">Titulo</label>
			</div>	
			<div class="grupo">	
				 <input type="text" name="medio" id="medio" value="<?php echo $medio?>" required><span class="barra"></span>
                <label for="medio">Medio</label>
            </div>			
            <div class="grupo">
                <input type="text" name="fecha" id="fecha" value="<?php echo $fecha?>" required><span class="barra"></span>
                <label for="fecha">Fecha(yyyy-mm-dd)</label>
			</div>	
			<div class="grupo">		
                 <input type="text" name="descripcion" id="descripcion" value="<?php echo $descripcion?>" required><span class="barra"></span>
                <label for="descripcion">Descripción</label>
			</div>
            <div style="text-align: center">
            <button type="button" onClick="f_validar('RegistrarNoticia')" class="btnOk">Guardar</button>
 			</div>	
			
        </div>
<input name="accion"  value="<?php echo $accion?>" type="hidden"></input> 	
<input name="TipodePersona"  value="<?php echo "1-PNT"?>" type="hidden"></input> 	
    </form>
    <script src="main.js"></script>
<script src="js/ValidarEntradas5.js">
</script>  
<script src = " https://unpkg.com/sweetalert/dist/sweetalert.min.js " ></script>

</body>
</html>