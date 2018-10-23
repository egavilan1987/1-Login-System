<?php 
	class Users{
		public function userRegister($data){
			
			$c=new Connect();
			$connection=$c->connection();


			$sql="INSERT INTO users (user_name,
							email,
							full_name,
							user_role,
							password,
							status,
							image,
							created_by_user,
							created_date)
						VALUES ('$data[0]',
							'$data[1]',
							'$data[2]',
							'$data[3]',
							'$data[4]',
							'Inactive',
							'../../files/profile_images/default-avatar.jpg',
							'$data[5]',
							 NOW())";

			return mysqli_query($connection,$sql);
		}
		public function loginUser($inform){
			
			$c=new Connect();
			$connection=$c->connection();
			
			$password=sha1($inform[1]);
			$_SESSION['user']=$inform[0];
			$_SESSION['iduser']=self::bringID($inform);

			$sql="SELECT * 
					FROM users 
				WHERE user_name='$inform[0]'
				AND password='$password'";

			$result=mysqli_query($connection,$sql);
			$row=mysqli_fetch_row($result);

				$showImage=explode("/", $row[7]);
				$imgPath=$showImage[1]."/".$showImage[2]."/".$showImage[3]."/".$showImage[4];

				$_SESSION['email']=$row[2];
				$_SESSION['fullName']=$row[3];
				$_SESSION['imagePath']=$imgPath;
				$_SESSION['role']=$row[4];
				$_SESSION['status']=$row[6];					
			
			if(mysqli_num_rows($result) > 0 AND $row[6]=='Active'){
				return 1;
			}
			else{
				return 0;
			}
		}
		public function bringID($inform){
			
			$c=new Connect();
			$connection=$c->connection();
			
			$password=sha1($inform[1]);
			
			$sql="SELECT id_user 
					FROM users 
					WHERE user_name='$inform[0]'
					AND password='$password'"; 
			$result=mysqli_query($connection,$sql);
			return mysqli_fetch_row($result)[0];
		}
		public function getUserData($idUser){
			
			$c=new Connect();
			$connection=$c->connection();
			
			$sql="SELECT id_user,
					user_name,
					email,
					full_name,
					user_role,
					status,
					image,
					created_by_user,
					created_date,
					updated_by_user,
					updated_date
					FROM users
					WHERE id_user='$idUser'";
					
			$result=mysqli_query($connection,$sql);
			
			$row=mysqli_fetch_row($result);

			$showImage=explode("/", $row[6]) ; 
            $imgPath=$showImage[1]."/".$showImage[2]."/".$showImage[3]."/".$showImage[4];
			
			$userData=array(
						'id_user' => $row[0],
						'user_name' => $row[1],
						'email' => $row[2],
						'full_name' => $row[3],
						'user_role' => $row[4],
						'status' => $row[5],
						'imagePath' => $imgPath,
						'created_by_user' => $row[7],
						'created_date' => $row[8],
						'updated_by_user' => $row[9],
						'updated_date' => $row[10]
						);
			return $userData;
		}
		public function updateUser($data){
			
			$c=new Connect();
			$connection=$c->connection();

			
			$sql="UPDATE users SET user_name='$data[1]',
						email='$data[2]',
						full_name='$data[3]',
						user_role='$data[4]',
						status='$data[5]',
						updated_by_user = 'adminUserExample',
						updated_date=NOW()
						WHERE id_user='$data[0]'";



			return mysqli_query($connection,$sql);	
		}

		public function updateImage($data){
			
			$c=new Connect();
			$connection=$c->connection();

			
			$sql="UPDATE users SET image='$data[1]',
						updated_date=NOW()
						WHERE id_user='$data[0]'";



			return mysqli_query($connection,$sql);	
		}
		public function updatePassword($data){
			
			$c=new Connect();
			$connection=$c->connection();

			
			$sql="UPDATE users SET password='$data[1]',
								   updated_by_user = '$data[2]',
								   updated_date=NOW()
						WHERE id_user='$data[0]'";



			return mysqli_query($connection,$sql);	
		}
		public function deleteUser($idUser){
			
			$c=new Connect();
			$connection=$c->connection();
			
			$sql="DELETE FROM users 
					WHERE id_user='$idUser'";
			return mysqli_query($connection,$sql);
		}

		public function checkPassword($data){
			
			$c=new Connect();
			$connection=$c->connection();

			$password=sha1($data[1]);

			$sql="SELECT * FROM users 
				WHERE id_user='$data[0]'";

			$result=mysqli_query($connection,$sql);
			$row=mysqli_fetch_row($result);

			if($password != $row[5]){
				return 1;
			}
			else{
				return 0;
			}
	}
}
 ?>


