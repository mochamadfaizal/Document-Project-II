<?php
include("config.php");

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db_qpay";

    // membuat koneksi
    $koneksi = new mysqli($servername, $username, $password, $dbname);

    // melakukan pengecekan koneksi
    if ($koneksi->connect_error) {
        die("Connection failed: " . $koneksi->connect_error);
    } 

    //menangkap parameter yang dikirimkan dari detail.php
    $id_krywn = $_POST['id_krywn'];
    $nama_krywn = $_POST['nama_krywn'];
    $alamat_krywn = $_POST['alamat_krywn'];
    $email_krywn = $_POST['email_krywn'];
    $telp_krywn = $_POST['telp_krywn'];
    $id_toko = $_POST['id_toko'];

    //perintah untuk melakukan update
    //melakukan update data berdasarkan ID
    $sql = "UPDATE data_karyawan SET nama_krywn = '$nama_krywn', alamat_krywn = '$alamat_krywn' email_krywn = '$email_krywn', telp_krywn = '$telp_krywn', id_toko = '$id_toko' WHERE id=$id";

    if ($koneksi->query($sql) === TRUE) {
        //jika  berhasil tampil ini
        echo "Data Berhasil Diubah"."</br>";
        echo "<a href='bootstrap.php'>Kembali Ke Halaman Depan</a>";
    } else {
        // jika gagal tampil ini
        echo "Gagal Melakukan Perubahan: " . $koneksi->error;
    }



    $koneksi->close();
?>