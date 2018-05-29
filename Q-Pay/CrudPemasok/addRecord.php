<?php
	if(isset($_POST['nama']) && isset($_POST['alamat']) && isset($_POST['no_telp']) && isset($_POST['id_toko']))
	{
		// include Database connection file 
		include("db_connection.php");

		// get values
		$nama = $_POST['nama'];
		$alamat = $_POST['alamat'];
		$no_telp = $_POST['no_telp'];
		$id_toko = $_POST['id_toko'];

		$query = "INSERT INTO data_pemasok(id_toko, nama, no_telp, alamat) VALUES( '$id_toko', '$nama', '$no_telp', '$alamat')";
		if (!$result = mysql_query($query)) {
	        exit(mysql_error());
	    }
	    echo "1 Record Added!";
	}
?>