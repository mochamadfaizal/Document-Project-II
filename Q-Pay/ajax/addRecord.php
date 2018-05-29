<?php
	if(isset($_POST['nama_krywn']) && isset($_POST['alamat_krywn']) && isset($_POST['email_krywn']) && isset($_POST['telp_krywn']) && isset($_POST['telp_krywn'])&& isset($_POST['telp_krywn']))
	{
		// include Database connection file 
		include("db_connection.php");

		// get values
		$nama_krywn = $_POST['nama_krywn'];
		$alamat_krywn = $_POST['alamat_krywn'];
		$email_krywn = $_POST['email_krywn'];
		$telp_krywn = $_POST['telp_krywn'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$id_toko = $_POST['id_toko'];

		$query2 = "INSERT INTO user(username, password, level) VALUES('$username', '$password', 'karyawan')";
		
		if(mysql_query($query2)){

		$query1 = "SELECT * FROM user WHERE username = '$username'";
		$fetch = mysql_query($query1);
		$data = mysql_fetch_array($fetch);

		$id_user = $data['id_user'];


		$query = "INSERT INTO data_karyawan(id_user, id_toko, nama, email, no_hp, alamat) VALUES('$id_user','$id_toko', '$nama_krywn', '$email_krywn', '$telp_krywn', '$alamat_krywn')";
		if (!$result = mysql_query($query)) {
	        exit(mysql_error());
	    }
	    echo "1 Record Added!";
	    }
	}
?>