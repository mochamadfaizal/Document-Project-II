<?php
// include Database connection file
include("db_connection.php");

// check request
if(isset($_POST))
{
    // get values
    $id = $_POST['id'];
    $user = $_POST['user'];
    $nama_krywn = $_POST['nama_krywn'];
    $alamat_krywn = $_POST['alamat_krywn'];
    $email_krywn = $_POST['email_krywn'];
    $telp_krywn = $_POST['telp_krywn'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $id_toko = $_POST['id_toko'];

    // Updaste User details
    $query = "UPDATE data_karyawan SET nama = '$nama_krywn', alamat = '$alamat_krywn', email = '$email_krywn', no_hp = '$telp_krywn' WHERE id_karyawan = '$id'";

    $query2 = "UPDATE user SET username = '$username', password = '$password' WHERE id_user = '$user'";

    mysql_query($query2);

    if (!$result = mysql_query($query)) {
        exit(mysql_error());
    }
}