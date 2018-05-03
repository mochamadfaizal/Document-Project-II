<?php

$servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "db_qpay";

            // Membuat Koneksi
            $koneksi = new mysqli($servername, $username, $password, $dbname);

$karyawan = "select * from data_karyawan";
$hasilkaryawan = mysqli_query($koneksi, $karyawan);
$jumlah_karyawan = mysqli_num_rows($hasilkaryawan);

?>