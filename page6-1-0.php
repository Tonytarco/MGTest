<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
</head>

<body>
<?php
    session_start();
    
    session_destroy();
    if (isset($_GET['msg'])){
	  $msg=$_GET['msg'];
	  header("Location: Home.php?msg=".$msg);
	   }else header("Location: Home.php");

?>	
</body>
</html>