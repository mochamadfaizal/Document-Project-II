<?php 
class Member {

	private $mysqli;

	function __construct($conn) {
		$this->mysqli = $conn;
	}

	public function tampil($id = null) {
		$db = $this->mysqli->conn;
		$sql = "SELECT * FROM data_member";
		if ($id != null) {
			$sql .= " WHERE id_member = $id";
		}
		$query = $db->query($sql) or die ($db->error);
		return $query;
	}

	public function tambah($id_user, $nama, $email, $alamat, $no_hp) {
		$db = $this->mysqli->conn;
		$db->query("INSERT INTO data_member VALUES ('', '$id_user' , '$nama', '$email', '$alamat', '$no_hp', '$jumlah_saldo')") or die ($db->error);
	}

	public function tambah_user($email, $password){
		$db = $this->mysqli->conn;
		$db->query("INSERT INTO user VALUES ('', '$email', '$password', 'member')") or die ($db->error);
		$sql = "SELECT * FROM user WHERE email = '$email'";
		$query = $db->query($sql) or die ($db->error);
		return $query;
	}

	public function edit($nama, $email, $password, $alamat, $no_hp) {
		$db = $this->mysqli->conn;
		$db->query() or die ($db->error);
	}

	public function hapus($id) {
		$db = $this->mysqli->conn;
		$db->query("DELETE FROM data_member WHERE id_member = '$id'") or die ($db->error);
	}

	function __destruct() {
		$db = $this->mysqli->conn;
		$db->close();
	}

}
?>