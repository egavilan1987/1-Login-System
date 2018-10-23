<?php 
	session_start();
	require_once "../../classes/connection.php";
	require_once "../../classes/users.php";
	$obj= new users;

	$updatePassword=sha1($_POST['password']);


	$data=array(
				);  
	echo $obj->updatePassword($data);
 ?>
