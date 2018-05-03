<body>
<div class="container">
  <div class="row">
    <div class="box-body table-responsive no-padding">
    <table class="table table-striped table-bordered">
      <tbody>
      <!-- Breadcrumbs -->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="timeline.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Data Karyawan</li>
      </ol>
      <!-- Icon Cards-->
        <tr align="center">
          <th>Id</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Email</th>
            <th>No HP</th>
            <th>Toko</th>
            <th colspan="2">Opsi</th>
        </tr>

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
                  <a href="<?php echo $data['id'];?>" class="btn btn-danger" onclick="return confirm('Apakah yakin Data Ingin Di Hapus?');">Hapus</a>
                  </td>
                  </tr>
            <?php 
            $no++; 
            } 
              } else { 
            echo "0 results"; 
              } $koneksi->close(); 
        ?>

      </tbody>
    </table>
  </div>
  </div>
</div>
</body>

