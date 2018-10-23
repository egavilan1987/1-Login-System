<?php 
	require_once "../../model/connection.php";
	require_once "../../model/Users.php";
	
	$obj= new Users();

	$pass=sha1($_POST['password']);
	$createdUser="Example User";
	//$currentDate=date("Y-m-d H:i:s");
	
	$data=array(
		$_POST['user'],
		$_POST['email'],
		$_POST['employee'],
		$_POST['role'],
		$pass,
		$createdUser
				);
	echo $obj->userRegister($data);

 ?>
