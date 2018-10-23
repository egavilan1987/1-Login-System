<?php 
	require_once "../../classes/connection.php";
	require_once "../../classes/users.php";
	
	$obj= new users();
	$password=sha1($_POST['password']);
	
	$data=array(
		$_POST['email'],
		$_POST['first_name'],
		$_POST['last_name'],
		$password
				);
	echo $obj->userRegister($data);
 ?>
