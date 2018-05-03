<?php
        include("config.php");

            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "db_qpay";

            // Membuat Koneksi
            $koneksi = new mysqli($servername, $username, $password, $dbname);
            
            // Melakukan Cek Koneksi
            if ($koneksi->connect_error) {
                die("Koneksi Gagal : " . $koneksi->connect_error);
            }

        //Melakukan query
            $sql = "SELECT * FROM data_karyawan";
            $hasil = $koneksi->query($sql);
            /*
            $no = 1;
            if ($hasil->num_rows > 0) {
                foreach ($hasil as $row) { ?>
                  <tr>
                  <td><?php echo $row['id_krywn']; ?></td>
                  <td><?php echo $row['nama_krywn']; ?></td>
                  <td><?php echo $row['alamat_krywn']; ?></td>
                  <td><?php echo $row['email_krywn']; ?></td>
                  <td><?php echo $row['telp_krywn']; ?></td>
                  <td><?php echo $row['id_toko']; ?></td>
                  <td>
                  <a href="#" class="btn btn-info">Edit</a>
                  </td>
                  <td>
                  <a href="proses.php?id=<?php echo $data['id'];?>" class="btn btn-danger" onclick="return confirm('Apakah yakin Data Ingin Di Hapus?');">Hapus</a>
                  </td>
                  </tr>
            <?php 
            $no++; 
            } 
              } else { 
            echo "0 results"; 
              } $koneksi->close(); */
        ?>

<div class="row">
  <div class="col-12">
      <header>
    <h3>Update Karyawan</h3>
  </header>
  
  <form action="./karyawan.php" method="POST">
  <div class="form-group">
    <label for="nama" class="col-sm-2 control-label">ID Karyawan</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="id_krywn" placeholder="A1" value="">
    </div>
  </div>

  <div class="form-group">    
    <label for="nama" class="col-sm-2 control-label">Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="nama_krywn" placeholder="First & Last Name" value="<?php echo $row['id_krywn']; ?>">
    </div>
  </div>

  <div class="form-group">
    <label for="alamat" class="col-sm-2 control-label">Alamat</label>
    <div class="col-sm-10">
      <textarea class="form-control" rows="4" name="alamat_krywn"></textarea>
    </div>
  </div>

  <div class="form-group">    
    <label for="nama" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" name="email_krywn" placeholder="ganteng@ganteng.com" value="">
    </div>
  </div>

  <div class="form-group">
    <label for="telp_pemasok" class="col-sm-2 control-label">Nomor Handphone</label>
    <div class="col-sm-10">
      <input type="number" class="form-control" name="telp_krywn" placeholder="08562419xxxx" value="">
    </div>
  </div>

  <div class="form-group">
    <label for="nama" class="col-sm-2 control-label">ID Toko</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="id_toko" placeholder="A001" value="">
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-10 col-sm-offset-2">
      <input id="submit" name="daftar" type="submit" value="Daftar" class="btn btn-primary">
    </div>
  </div>
  </form>
  </div>
</div>