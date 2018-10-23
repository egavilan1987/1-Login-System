
<?php 
	class Connect{
		private $server="localhost";
		private $user="root";
		private $password="";
		private $db="login";
		public function connection(){
			$connection=mysqli_connect($this->server,
									 $this->user,
									 $this->password,
									 $this->db);
			return $connection;
		}
	}
 ?>
