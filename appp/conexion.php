<?php

$usuario=$_POST['usuario'];
$pass=$_POST['pass'];

if(empty($usuario) | empty($pass)){

	header("location: login.html");

	exit();
}

$mysqli = new mysqli("database", "admin", "db-phreportes", "db-phreportes");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

$query = "SELECT * FROM persona WHERE usuario='" . $usuario . "'";

$response_db = $mysqli->query($query);

$row = $response_db->fetch_array(MYSQLI_ASSOC);

if($row){

	if($row["pass"] == $pass){

		session_start();
		$_SESSION['usuario'] = $usuario;
		header("location: admin.html");
		
	}else{

		header("location:login.html");
		exit();	}

	}else{
		header("location:login.html");
		exit();	
		
	}