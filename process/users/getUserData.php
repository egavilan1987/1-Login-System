<?php 
	session_start();
	require_once "../../classes/connection.php";
	require_once "../../classes/users.php";
	$obj= new users;
	
	echo json_encode($obj->getUserData($_POST['idUser']));
 ?>
