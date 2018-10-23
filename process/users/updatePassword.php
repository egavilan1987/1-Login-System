<?php 
	session_start();
	require_once "../../model/connection.php";
	require_once "../../model/Users.php";
	$obj= new users;

	$updatePassword=sha1($_POST['password']);


	$data=array(
				$_POST['idUpdatePassword'],
			    $updatePassword,
			    $_SESSION['user']
				);  
	echo $obj->updatePassword($data);
 ?>
