<?php 
	session_start();
	require_once "../../model/connection.php";
	require_once "../../model/Users.php";
	
	$obj= new Users();

	$user='egavilan';
	$password='adminadmin';

	$loginData=array(
		$user,
		$password
	);


	print_r($_SESSION);
 ?>