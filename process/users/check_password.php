<?php 
	session_start();
	require_once "../../model/connection.php";
	require_once "../../model/Users.php";
	$obj= new users;

	$idUser = $_SESSION['iduser'];

 $data=array(
		$idUser,
		$_POST['oldPassword'],
		);

 echo $obj->checkPassword($data);
	//print_r($data);
 ?>

