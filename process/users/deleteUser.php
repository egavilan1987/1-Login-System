<?php 
	session_start();
	require_once "../../model/connection.php";
	require_once "../../model/Users.php";

	$obj= new Users;

	echo $obj->deleteUser($_POST['idUser']);
 ?>
