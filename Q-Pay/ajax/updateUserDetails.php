<?php
// include Database connection file
include("db_connection.php");

// check request
if(isset($_POST))
{
    // get values
    $id = $_POST['id'];
    $nama_krywn = $_POST['nama_krywn'];
    $alamat_krywn = $_POST['alamat_krywn'];
    $email_krywn = $_POST['email_krywn'];
    $telp_krywn = $_POST['telp_krywn'];
    $id_toko = $_POST['id_toko'];

    // Updaste User details
    $query = "UPDATE data_karyawan SET nama_krywn = '$nama_krywn', alamat_krywn = '$alamat_krywn', email_krywn = '$email_krywn', id_toko = '$id_toko' WHERE id = '$id'";
    if (!$result = mysql_query($query)) {
        exit(mysql_error());
    }
}