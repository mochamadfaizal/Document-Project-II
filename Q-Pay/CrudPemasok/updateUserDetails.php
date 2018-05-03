<?php
// include Database connection file
include("db_connection.php");

// check request
if(isset($_POST))
{
    // get values
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $no_telp = $_POST['no_telp'];
    $id_toko = $_POST['id_toko'];

    // Updaste User details
    $query = "UPDATE data_pemasok SET nama = '$nama', alamat = '$alamat' WHERE id_pemasok = '$id_pemasok'";
    if (!$result = mysql_query($query)) {
        exit(mysql_error());
    }
}