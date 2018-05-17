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

$pemasok = "select * from data_pemasok";
$hasilpemasok = mysqli_query($koneksi, $pemasok);
$jumlah_pemasok = mysqli_num_rows($hasilpemasok);

?>