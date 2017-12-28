<?php
require_once 'Koneksi.php';
session_start();
$koneksi = new Koneksi();
$h = $koneksi->connect();
if (isset($_SESSION['email'])){
	header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>LOGIN PENGGUNA</title>
    <!-- <link href="css/bootstrap.min.css" rel="stylesheet"> -->
		<link href="css/materialize.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="js/jquery.min.js"></script>
		<script src="js/materialize.js"></script>
    <script src="js/service.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyAyvzGrCrvUNEA_ofNFVfXOeHUje8XGW-A"></script> -->
    <script src="js/marker.js"></script>
    <!-- <script src="js/map.js"></script> -->
    <script src="js/style.js"></script>
    <script src="js/controller.js"></script>
  </head>
  <body style="height:100vh; background-image:url('images/bg.jpg')" class="bg">
		<nav class="red navbar-fixed">
      <div class="nav-wrapper">
        <ul class="left">
          <li><a href="index.php" class="navbar-icon-font"><i class="material-icons white-text">arrow_back</i></a></li>
        </ul>
        <div class="col">
          <span class="white-text subs-detail">Registrasi User</span>
        </div>
      </div>
    </nav>

      <div class="w100 marg50-top">
				<form class="" action="" method="post">
					<div class="pad20 marg20 col-md-4 centerHorizontal card indigo lighten-5">
						<div class="col s12 tengah-text title">
							REGISTER
						</div>
						<div class="input-field col s12 marg20-top">
							<input id="email" type="text" class="validate" required="" aria-required="true" name="email">
							<label for="email">Email</label>
						</div>
						<div class="input-field col s12 marg8-top">
							<input id="password" type="password" class="validate" required="" aria-required="true" name="password">
							<label for="password">Password</label>
						</div>
						<div class="input-field col s12 marg8-top">
							<input id="nama" type="text" class="validate" required="" aria-required="true" name="nama">
							<label for="nama">Nama Pengguna</label>
						</div>
						<div class="input-field col s12 marg8-top">
							<input type="text" id="alamat" class="materialize-textarea" required="" aria-required="true" name="alamat"/>
							<label for="alamat">Alamat Pengguna</label>
						</div>

						<div class="col s12 tengah-text">
							<input type="submit" class="red waves-effect waves-light btn" value="DAFTAR"></input>
						</div>
					</div>
				</form>
      </div>
  </body>
</html>


<?php
  if(isset($_POST['email'])){
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $isUser = false;

    $query = mysqli_query($h, "SELECT * from user WHERE email_user = '$email'");
    // while($row = $query->fetch_array()){
    //   $isUser = true;
    // }
    // $query->num_rows

    if($query->num_rows==0){
      $hasil=mysqli_query($h, "INSERT INTO user(email_user, password_user, nama_user, alamat_user)
      values('$email', '$password', '$nama', '$alamat')");
      if($hasil){
        echo "
          <script>
          window.alert('Berhasil register');
          window.location='login.php';
          </script>";
      }else {
        echo "
          <script>
          window.alert('Bermasalah dengan server');
          </script>";
      }
    }else {
      echo "<script type='text/javascript'>alert('Email sudah terdaftar !')</script>";
    }
  }
?>
