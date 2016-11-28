<!DOCTYPE>
<html>
<head>
	<title>Registrar</title>
</head>
<body>

<?php

//conexion con la bd
include("conexion.php");


//extraer datos
$Nombre   = $_POST['Nom'];
$Apellido = $_POST['Ape'];
$Email    = $_POST['Ema'];
$Clave    = $_POST['Cl'];

//insertar datos en la bd

$insertar = "INSERT INTO usuarios values(idusuarios,'$Nombre','$Apellido','$Email','$Clave')";


$resultado = mysqli_query($conexion, $insertar)
			 or die ("error al insertar los datos");


mysqli_close($conexion);
echo "los datos fueron insertados";


?>



</body>
</html>
