<?php
// include Database connection file
include("db_connection.php");

// check request
if(isset($_POST['id']) && isset($_POST['nama']) && isset($_POST['alamat']) && isset($_POST['no_telp']))
{
    // get values
    $id_pemasok = $_POST['id'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $no_telp = $_POST['no_telp'];

    // Updaste User details
    $query = "UPDATE data_pemasok SET nama = '$nama', no_telp = '$no_telp', alamat = '$alamat' WHERE id_pemasok = '$id_pemasok'";
    
    if (!$result = mysql_query($query)) {
        exit(mysql_error());
    }
}