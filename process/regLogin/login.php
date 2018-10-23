<?php 
	session_start();
	require_once "../../model/connection.php";
	require_once "../../model/Users.php";
	
	$obj= new Users();

	$loginData=array(
		$_POST['user'],
		$_POST['password']
	);

	echo $obj->loginUser($loginData);

 ?>