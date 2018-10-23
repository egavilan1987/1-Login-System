<?php 
	session_start();
	require_once "../../model/connection.php";
	require_once "../../model/Users.php";
	$obj= new Users;
	
	echo json_encode($obj->getUserData($_POST['idUser']));
 ?>
