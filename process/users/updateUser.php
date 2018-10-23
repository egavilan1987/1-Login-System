<?php 
	session_start();
	require_once "../../model/connection.php";
	require_once "../../model/Users.php";
	$obj= new users;

	$userArray=array(
				$_POST['idUser'],
			    $_POST['updateUserName'],  
			    $_POST['updateEmail'] , 
			    $_POST['updateFullName'],  
			    $_POST['updateRole'],
			    $_POST['updateStatus']
				);  
	echo $obj->updateUser($userArray);
 ?>