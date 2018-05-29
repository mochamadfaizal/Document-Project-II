<?php 

require_once("config.php");

if(isset($_POST['login'])){




    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    $sql = "SELECT * FROM user WHERE username=:username";
    $stmt = $db->prepare($sql);
    
    // bind parameter ke query
    $params = array(
        ":username" => $username,
    );

    $stmt->execute($params);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    $hash = $user["password"];

    // jika user terdaftar
    if($user){


        // verifikasi password
        if(password_verify($password, $hash)){
            // buat Session
            session_start();
            $_SESSION["user"] = $user;

            if($user["level"]=="admin"){
              header("Location: Admin/index.php");

            }else if($user["level"]=="pemilik toko"){
            // login sukses, alihkan ke halaman timeline
    $sql2 = "SELECT * FROM data_toko WHERE id_user=:id_user";
    $stmt2 = $db->prepare($sql2);
    
    // bind parameter ke query
    $params2 = array(
        ":id_user" => $user["id_user"],
    );

    $stmt2->execute($params2);

    $user2 = $stmt2->fetch(PDO::FETCH_ASSOC);

            $_SESSION["id_toko"] = $user2["id_toko"];
            
            header("Location: timeline.php");
          }else{
            echo "Gagal Login";
          }
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
  <title>Q-Payment Admin</title>
  <link rel="icon" type="image/png" href="images/icon.ico">
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body class="bg-dark">
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login</div>
      <div class="card-body">

        <form action="" method="POST">
          <div class="form-group">
            <label for="username">Username</label>
            <input class="form-control" type="text" name="username"  placeholder="Enter Username">
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input class="form-control" type="password" name="password" placeholder="Password">
          </div>
          <div class="form-group">
            <div class="form-check">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox"> Remember Password</label>
            </div>
          </div>

          <input type="submit" class="btn btn-primary btn-block" name="login" value="Login" />

        </form>

        <div class="text-center">
          <a class="d-block small mt-3" href="register.php">Register an Account</a>
        </div>
        <div class="text-left">
          <a class="d-block small mt-2" href="register.php">Forgot Password</a>
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
