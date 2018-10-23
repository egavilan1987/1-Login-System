<?php 
	session_start();
	require_once "../../classes/connection.php";
	require_once "../../classes/users.php";
	
	$obj= new Users();

	$loginData=array(
		$_POST['email'],
		$_POST['password']
	);

	echo $obj->loginUser($loginData);

 ?>
