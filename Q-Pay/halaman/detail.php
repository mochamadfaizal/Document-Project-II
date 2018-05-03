<?php
include("../config.php");

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

    if($_POST['rowid']) {
        $id = $_POST['rowid'];
        // mengambil data berdasarkan id
        // dan menampilkan data ke dalam form modal bootstrap
        $sql = "SELECT * FROM data_karyawan WHERE id_krywn = 'A3'";
        $result = $koneksi->query($sql);
        foreach ($result as $baris) { ?>

        <!-- MEMBUAT FORM -->
        <form action="update.php" method="post">
            <input type="hidden" name="id" value="<?php echo $baris['id_krywn']; ?>">

            <div class="form-group">
                <label for="nama" class="col-sm-2 control-label">ID Karyawan</label>
                <input type="text" class="form-control" name="id_krywn" value="<?php echo $baris['id_krywn']; ?>">
            </div>
            <div class="form-group">
                <label>Nama Karyawan</label>
                <input type="text" class="form-control" name="nama_krywn" value="<?php echo $baris['nama_krywn']; ?>">
            </div>
            <div class="form-group">
                <label>Alamat Karyawan</label>
                <textarea class="form-control" rows="5" name="alamat_krywn" ><?php echo $baris['alamat_krywn']; ?></textarea>
            </div>
            <div class="form-group">
                <label>Email Karyawan</label>
                <input type="text" class="form-control" name="email_krywn" value="<?php echo $baris['email_krywn']; ?>">
            </div>
            <div class="form-group">
                <label>No Handphone</label>
                <input type="text" class="form-control" name="telp_krywn" value="<?php echo $baris['telp_krywn']; ?>">
            </div>
            <div class="form-group">
                <label for="nama" class="col-sm-2 control-label">ID Toko</label>
                <input type="text" class="form-control" name="id_toko" value="<?php echo $baris['id_toko']; ?>">
            </div>
              <button class="btn btn-primary" type="submit">Update</button>
        </form>

        <?php } }
    $koneksi->close();
?>