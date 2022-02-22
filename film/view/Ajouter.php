<?php 

	Class Model{

		private $server = "localhost";
		private $username = "root";
		private $password;
		private $db = "films";
		private $conn;

		public function __construct(){
			try {
				
				$this->conn = new mysqli($this->server,$this->username,$this->password,$this->db);
			} catch (Exception $e) {
				echo "connection failed" . $e->getMessage();
			}
		}

		public function insert(){

			if (isset($_POST['submit'])) {
				if (isset($_POST['Nom']) && isset($_POST['Prenom']) && isset($_POST['Gmail']) && isset($_POST['pasword'])) {
					if (!empty($_POST['Nom']) && !empty($_POST['Prenom']) && !empty($_POST['Gmail']) && !empty($_POST['pasword']) ) {
						
						$Nom = $_POST['Nom'];
						$Prenom = $_POST['Prenom'];
						$Gmail = $_POST['Gmail'];
						$pasword = $_POST['pasword'];

						$query = "INSERT INTO persone (Nom,Prenom,Gmail,pasword) VALUES ('$Nom','$Prenom','$Gmail','$pasword')";
						if ($sql = $this->conn->query($query)) {
							echo "<script>alert('records added successfully');</script>";
							echo "<script>window.location.href = 'index.php';</script>";
						}else{
							echo "<script>alert('failed');</script>";
							echo "<script>window.location.href = 'index.php';</script>";
						}
					
					}else{
						echo "<script>alert('empty');</script>";
						echo "<script>window.location.href = 'index.php';</script>";
					}
				}
			}
		}

		public function etch(){
			$data = null;

			$query = "SELECT * FROM persone";
			if ($sql = $this->conn->query($query)) {
				while ($row = mysqli_fetch_assoc($sql)) {
					$data[] = $row;
				}
			}
			return $data;
		}

		// public function delete($id){

		// 	$query = "DELETE FROM records where id = '$id'";
		// 	if ($sql = $this->conn->query($query)) {
		// 		return true;
		// 	}else{
		// 		return false;
		// 	}
		// }

		// public function fetch_single($id){

		// 	$data = null;

		// 	$query = "SELECT * FROM records WHERE id = '$id'";
		// 	if ($sql = $this->conn->query($query)) {
		// 		while ($row = $sql->fetch_assoc()) {
		// 			$data = $row;
		// 		}
		// 	}
		// 	return $data;
		// }

		// public function edit($id){

		// 	$data = null;

		// 	$query = "SELECT * FROM records WHERE id = '$id'";
		// 	if ($sql = $this->conn->query($query)) {
		// 		while($row = $sql->fetch_assoc()){
		// 			$data = $row;
		// 		}
		// 	}
		// 	return $data;
		// }

		// public function update($data){

		// 	$query = "UPDATE records SET nam='$data[nam]', email='$data[email]', mobile='$data[mobile]', addres='$data[addres]' WHERE id='$data[id] '";

		// 	if ($sql = $this->conn->query($query)) {
		// 		return true;
		// 	}else{
		// 		return false;
		// 	}
		// }
	}

 ?>