<?php 
	session_start();
	require_once "../../model/connection.php";
	require_once "../../model/Users.php";
	$obj= new users;


	$imgName=$_FILES['image']['name'];
	$storagePath=$_FILES['image']['tmp_name'];
	$folder='../../files/profile_images/';
	$finalPath=$folder.$imgName;

	$imgData=array(
		$_POST['idUserImage'],
		$finalPath
				);

		if(move_uploaded_file($storagePath, $finalPath)){
			echo $obj->updateImage($imgData);
		}


 ?>