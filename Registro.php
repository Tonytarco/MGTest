<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/estilosis14.css">
	
	       
</head>
<body>
<?php 
session_start();
?>	<div align="center"><img src="Imagenes/home5.png" width="15%"></div>
    <form action="" name="clientes" method="POST" id="form">
        <div class="form">
		<?php	
if (isset($_POST["Enterprise"]))$enterprise = $_POST["Enterprise"];else $enterprise="";	    
if (isset($_POST["accion"]))$accion = $_POST["accion"];else $accion="";
if (isset($_POST["name"]))$name = $_POST["name"];else $name="";		
if (isset($_POST["username"]))$username = $_POST["username"];else $username="";					
if (isset($_POST["password"]))$password = $_POST["password"];else $password="";				
	
if ($accion=="registrarusuarioP1")
{
 include("actualizar_datos.php");

 $rowrsdepto2=insertar_record($accion,'J-403961441',7,'RIF');
 $row_rsdepto2=$rowrsdepto2[0];
  }else if($accion=="Cancelar"){

header('location:Home.php');	
} ?>
			<h1>REGÍSTRATE</h1>

            <div class="grupo">
                <input type="text" name="name" id="name" value="<?php echo $name?>" required><span class="barra"></span>
                <label for="">Nombres</label>
            </div>			
            <div class="grupo">
                <input type="text" name="username" id="username" value="<?php echo $username?>" required><span class="barra"></span>
                <label for="">E-mail</label>
            </div>
            <div class="grupo">
                <input type="password" name="password" id="password" value="<?php echo $password?>" autocomplete="off" required><span class="barra"></span>
                <label for="">Contraseña</label>
            </div>
           <div style="text-align: center">
            <button type="button" onClick="f_validar('usuarioP1')" class="btnOk">Guardar</button>
            <button type="button" onClick="f_validar('Cancelar')"class="btnCancel">Cancelar</button>
			</div>	
			
        </div>
<input name="accion"  value="<?php echo $accion?>" type="hidden"></input> 	
<input name="TipodePersona"  value="<?php echo "1-PNT"?>" type="hidden"></input> 	
    </form>
    <script src="main.js"></script>
<script src="js/ValidarEntradas3.js">
</script>  
<script src = " https://unpkg.com/sweetalert/dist/sweetalert.min.js " ></script>

</body>
</html>