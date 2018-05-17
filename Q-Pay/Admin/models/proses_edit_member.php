<?php 
require_once('../config/koneksi.php');
require_once('../models/database.php');
include "m_member.php";
$connection = new Database($host, $user, $pass, $database);
$mbr = new Member($connection);

$id_member = $_POST['id_member'];
$nama = $connection->conn->real_escape_string($_POST['nama']);
$password = $connection->conn->real_escape_string($_POST['pass']);
$email = $connection->conn->real_escape_string($_POST['email']);
$alamat = $connection->conn->real_escape_string($_POST['alamat']);
$no_hp = $connection->conn->real_escape_string($_POST['nohp']);


echo "<script>window.location='?page=member';</script>";
?>