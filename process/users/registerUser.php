<?php
	session_start(); 
	require_once "../../model/connection.php";
	require_once "../../model/Users.php";
	
	$obj= new Users();

	$pass=sha1($_POST['password']);
	$createdUser="Example User";

	
	$data=array(
		$_POST['user'],
		$_POST['email'],
		$_POST['employee'],
		$_POST['role'],
		$pass,
		$_SESSION['user']
				);
	echo $obj->userRegister($data);

 ?>
