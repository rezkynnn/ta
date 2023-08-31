<?php
// Memulai session.
session_start();
// Include koneksi database.
require_once "koneksi.php";

// Jika tombol login ditekan, maka akan mengirimkan variabel yang berisi email dan password.
if (isset($_POST['submit'])) {

    $username = addslashes($_POST['username']);
    $userpass = $_POST['password']; // password yang di inputkan oleh user lewat form login.

    // Query ke database.
    $sql = mysqli_query($koneksi, "SELECT username, password, nama, level FROM user WHERE username = '$username'");

    list($username, $password, $nama, $level) = mysqli_fetch_array($sql);

    // Jika data ditemukan dalam database, maka akan melakukan validasi dengan password_verify.
    if (mysqli_num_rows($sql) > 0) {

        /*
            Validasi login dengan password_verify
            $userpass -----> diambil dari password yang diinputkan user lewat form login
            $password -----> diambil dari password dalam database
        */
        if (password_verify($userpass, $password)) {


        	if ($level == "admin") {
        		// Buat session baru.
            session_start();
            $_SESSION['username'] = $username;
            $_SESSION['nama']  = $nama;
            $_SESSION['level'] = $level;
            $_SESSION['login'] = "sudah_login";

            // Jika login berhasil, user akan diarahkan ke halaman admin.
            header("location: userarea/dashboard.php");


        	} elseif ($level == "user") {
        		// Buat session baru.
            session_start();
            $_SESSION['username'] = $username;
            $_SESSION['nama']  = $nama;
            $_SESSION['level'] = $level;
            $_SESSION['login'] = "sudah_login";

            // Jika login berhasil, user akan diarahkan ke halaman admin.
            header("location: user/dashboard.php");
            die();
        	}

            
        } else {
            echo '<script language="javascript">
                    window.alert("LOGIN GAGAL! Silakan coba lagi");
                    window.location.href="index.php?pesan=gagal login data tidak ditemukan.";
                  </script>';

        }
    } else {
       echo '<script language="javascript">
                window.alert("LOGIN GAGAL! Silakan coba lagi");
                window.location.href="index.php?pesan=gagal login data tidak ditemukan.";
             </script>';

    }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="login-form-02/fonts/icomoon/style.css">

    <link rel="stylesheet" href="login-form-02/css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="login-form-02/css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="login-form-02/css/style.css">

    <title>Login #2</title>
  </head>
  <body>
  

  <div class="d-lg-flex half">
    <div class="bg order-1 order-md-2" style="background-image: url('login-form-02/images/3.jpeg');"></div>
    <div class="contents order-2 order-md-1">

      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-7">
          	<center>
            	<img src="images/maruki.png" width="300">
            	</center>
            <h3>Login <strong>SISTEM PENGENDALI KUALITAS</strong></h3>
            <p class="mb-4">PT. MARUKI INTERNASIONAL INDONESIA</p>
            <form action="" method="POST">
            	
              <div class="form-group first">
                <label for="username">Username</label>
                <input type="text" name="username" class="form-control" placeholder="Username" id="username">
              </div>
              <div class="form-group last mb-3">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Password" id="password">
              </div>
              
             <!--  <div class="d-flex mb-5 align-items-center">
                <label class="control control--checkbox mb-0"><span class="caption">Remember me</span>
                  <input type="checkbox" checked="checked"/>
                  <div class="control__indicator"></div>
                </label>
                <span class="ml-auto"><a href="#" class="forgot-pass">Forgot Password</a></span> 
              </div> -->

              <input type="submit" name="submit" value="Log In" class="btn btn-block btn-primary">

            </form>
            <?php if(isset($_GET['pesan'])) { ?>
            <div class="error">
                <label>Oopps... <?php echo $_GET['pesan']; ?></label>
            </div>
        <?php } ?>
          </div>
        </div>
      </div>
    </div>

    
  </div>
    
    

    <script src="login-form-02/js/jquery-3.3.1.min.js"></script>
    <script src="login-form-02/js/popper.min.js"></script>
    <script src="login-form-02/js/bootstrap.min.js"></script>
    <script src="login-form-02/js/main.js"></script>
  </body>
</html>

