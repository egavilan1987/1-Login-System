<?php 
	class users{
		public function userRegister($data){
			
			$c=new Connect();
			$connection=$c->connection();


			$sql="INSERT INTO users (
							email,
							password,
							first_name,
							last_name,
							created_date)
						VALUES ('$data[0]',
							'$data[1]',
							'$data[2]',
							'$data[3]',
							 NOW())";

			return mysqli_query($connection,$sql);
		}
		public function loginUser($inform){
			
			$c=new Connect();
			$connection=$c->connection();
			
			$password=sha1($inform[1]);
			$_SESSION['email']=$inform[0];
			$_SESSION['iduser']=self::bringID($inform);

			$sql="SELECT * 
					FROM users 
				WHERE email='$inform[0]'
				AND password='$password'";

			$result=mysqli_query($connection,$sql);
			$row=mysqli_fetch_row($result);

				$_SESSION['email']=$row[0];
				$_SESSION['first_name']=$row[1];
				$_SESSION['last_name']=$row[2];
				$_SESSION['created_date']=$row[3];					
			
			if(mysqli_num_rows($result) > 0){
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
					WHERE email='$inform[0]'
					AND password='$password'"; 
			$result=mysqli_query($connection,$sql);
			return mysqli_fetch_row($result)[0];
		}
		public function getUserData($idUser){
			
			$c=new Connect();
			$connection=$c->connection();
			
			$sql="SELECT id_user,
					email,
					first_name,
					last_name,
					created_date
					FROM users
					WHERE id_user='$idUser'";
					
			$result=mysqli_query($connection,$sql);
			
			$row=mysqli_fetch_row($result);
			
			$userData=array(
						'id_user' => $row[0],
						'email' => $row[1],
						'first_name' => $row[2],
						'last_name' => $row[3],
						'created_date' => $row[4]
						);
			return $userData;
		}

		public function updatePassword($data){
			
			$c=new Connect();
			$connection=$c->connection();

			
			$sql="UPDATE users SET password='$data[1]', updated_date=NOW()
						WHERE id_user='$data[0]'";



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


