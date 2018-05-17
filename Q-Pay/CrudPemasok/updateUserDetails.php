<?php
// include Database connection file
include("db_connection.php");

// check request
if(isset($_POST['id']) && isset($_POST['nama']) && isset($_POST['alamat']) && isset($_POST['no_telp']) && isset($_POST['id_toko']))
{
    // get values
    $id_pemasok = $_POST['id'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $no_telp = $_POST['no_telp'];
    $id_toko = $_POST['id_toko'];

    // Updaste User details
    $query = "UPDATE data_pemasok SET nama_pmsk = '$nama', alamat_pmsk = '$alamat', telp_pmsk = '$no_telp' WHERE id_pemasok = '$id_pemasok'";
    
    if (!$result = mysql_query($query)) {
        exit(mysql_error());
    }
}