<?php

require_once("config.php");

if(isset($_POST['register'])){

    // filter data yang diinputkan
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $toko = filter_input(INPUT_POST, 'toko', FILTER_SANITIZE_STRING);
    $alamat = filter_input(INPUT_POST, 'alamat', FILTER_SANITIZE_STRING);
    // enkripsi password
    $options = array("cost"=>4);
    $password = password_hash($_POST["password"],PASSWORD_BCRYPT, $options);
    var_dump($password);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

    $level = "pemilik toko";
    // menyiapkan query
    $sql = "INSERT INTO user (username, password, level) 
            VALUES (:username, :password, :level)";
    $stmt = $db->prepare($sql);

    // bind parameter ke query
    $params = array(
        ":username" => $username,
        ":password" => $password,
        ":level" => $level
    );

    // eksekusi query untuk menyimpan ke database
    $saved = $stmt->execute($params);

    // jika query simpan berhasil, maka user sudah terdaftar
    // maka alihkan ke halaman login
    if($saved) {
      $usern=$username;
      $ambil=$db->prepare("select * from user where username=?");
 
$ambil->BindParam(1,$usern);
 
$ambil->execute();
 
while($tampil=$ambil->fetch()){
 
            $id = $tampil['id_user'];
 
}
      $sql2 = "INSERT INTO data_toko (id_user, nama_toko, nama_pemilik_toko, alamat_toko, email) 
            VALUES (:user, :nama, :toko, :alamat, :email)";
      $stmt2 = $db->prepare($sql2);

      $params2 = array(
        ":user" => $id,
        ":nama" => $name,
        ":toko" => $toko,
        ":alamat" => $alamat,
        ":email" => $email

    );

      $saved2 = $stmt2->execute($params2);
     if($saved2){
      header("Location: login.php");
      }
     }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>SB Admin - Start Bootstrap Template</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body class="bg-dark">
  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Register an Account</div>
      <?php 
      

      ?>
      <div class="card-body">
        <form action="" method="POST">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="name">Nama Lengkap</label>
                <input class="form-control" type="text" name="name" aria-describedby="nameHelp" placeholder="Nama Kamu">
              </div>

              <div class="col-md-6">
                <label for="username">Username</label>
                <input class="form-control" type="text" name="username" aria-describedby="nameHelp" placeholder="Username">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="toko">Nama Toko</label> 
            <input class="form-control" type="teks" name="toko" aria-describedby="tokoHelp" placeholder="Nama Toko">
          </div>
          <div class="form-group">
            <label for="email">Email address</label> 
            <input class="form-control" type="email" name="email" aria-describedby="emailHelp" placeholder="Alamat Email">
          </div>
          <div class="form-group">
                <label for="password">Password</label>
                <input class="form-control" type="password" name="password" placeholder="Password">
          </div>
          <div class="form-group">
            <label for="alamat">Alamat Toko</label> 
            <input class="form-control" type="textarea" name="alamat" aria-describedby="alamatHelp" placeholder="Alamat Toko">
          </div>
          <div class="form-group">
            <label for="logo">Logo Toko (Jika Ada)</label> 
            <input class="form-control" type="file" name="Logo" aria-describedby="logoHelp">
          </div>
          <input type="submit" class="btn btn-primary btn-block" name="register" value="Daftar" />
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="login.php">Login Page</a>
        </div>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
</body>

</html>
