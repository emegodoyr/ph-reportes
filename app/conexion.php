<?php

$usuario=$_POST['usuario'];
$pass=$_POST['pass'];

if(empty($usuario) | empty($pass)){

	

	header("location: login.html");

	exit();


}
	
mysql_connect('localhost','root','lentao1649_') or die ("error al conectar" . mysql_error());
mysql_select_db('login') or die ("error seleccionar db" . mysql_error());

$result=mysql_query("SELECT * FROM persona WHERE usuario='" . $usuario . "'");
$row = mysql_fetch_array($result);

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