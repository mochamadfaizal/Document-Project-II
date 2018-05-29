<?php

include("config.php");

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['daftar'])){
	
	// ambil data dari formulir
	$id_krywn = $_POST['id_krywn'];
	$nama_krywn = $_POST['nama_krywn'];
	$alamat_krywn = $_POST['alamat_krywn'];
	$email_krywn = $_POST['email_krywn'];
	$telp_krywn = $_POST['telp_krywn'];
	$id_toko = $_POST['id_toko'];
	
	$host = 'localhost';
	$user = 'root';
	$pass = '';
	$nmdb = 'q_pay';

	$konek = mysqli_connect($host, $user, $pass, $nmdb);
	// buat query
	$sql = "INSERT INTO data_karyawan (id_karayawan, id_user, id_toko, nama_krywn, alamat_krywn, email_krywn, telp_krywn, id_toko) VALUES ('$id_krywn', '$nama_krywn', '$alamat_krywn', '$email_krywn' , '$telp_krywn', '$id_toko')";
	$query = mysqli_query($konek, $sql);
	
	// apakah query simpan berhasil?
	if( $query ) {
		// kalau berhasil alihkan ke halaman index.php dengan status=sukses
		header('Location: timeline.php?status=sukses');
	} else {
		// kalau gagal alihkan ke halaman indek.ph dengan status=gagal
		header('Location: timeline.php?status=gagal');
	}
	
	
} else {
	die("Akses dilarang...");
}

?>
