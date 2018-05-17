<?php
	if(isset($_POST['nama_krywn']) && isset($_POST['alamat_krywn']) && isset($_POST['email_krywn']) && isset($_POST['telp_krywn']) && isset($_POST['id_toko']))
	{
		// include Database connection file 
		include("db_connection.php");

		// get values
		$nama_krywn = $_POST['nama_krywn'];
		$alamat_krywn = $_POST['alamat_krywn'];
		$email_krywn = $_POST['email_krywn'];
		$telp_krywn = $_POST['telp_krywn'];
		$id_toko = $_POST['id_toko'];

		$query = "INSERT INTO data_karyawan(nama_krywn, alamat_krywn, email_krywn, telp_krywn, id_toko) VALUES('$nama_krywn', '$alamat_krywn','$email_krywn', '$telp_krywn', '$id_toko')";
		if (!$result = mysql_query($query)) {
	        exit(mysql_error());
	    }
	    echo "1 Record Added!";
	}
?>