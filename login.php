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
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/materialize.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Lobster|Open+Sans:400,400italic,300italic,300|Raleway:300,400,600' rel='stylesheet' type='text/css'>

    <script src="js/jquery.min.js"></script>
    <script src="js/service.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/materialize.js"></script>
    <!-- <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyAyvzGrCrvUNEA_ofNFVfXOeHUje8XGW-A"></script> -->
    <script src="js/marker.js"></script>
    <!-- <script src="js/map.js"></script> -->
    <script src="js/style.js"></script>
    <script src="js/controller.js"></script>
  </head>
  <body style="height:100vh; background-image:url('images/bg.jpg')" class="bg">
    <div class="w100 heightWindow" style="position:absolute;height:100vh;background-color:black; opacity:0.1">
    </div>
		<form class="" action="" method="post">
			<div class="w100" style="height:100vh">
				<div class="w100 tengah-text pad20">
					<h2 class="subs-title centerHorizontal fixed">SIGAP BENCANA LONGSOR</h2>
				</div>
				<div class="pad20 marg20 col-md-4 centerVertical centerHorizontal card indigo lighten-5">
					<div class="col s12 tengah-text title">
						LOGIN
					</div>
					<div class="input-field col s12 marg20-top">
						<input id="email" type="text" class="validate" name="email">
						<label for="email">Email</label>
					</div>
					<div class="input-field col s12 marg8-top">
						<input id="password" type="password" class="validate" required="" aria-required="true" name="password">
						<label for="password">Password</label>
					</div>
					<div class="col s12 tengah-text">
						<input type="submit" class="red waves-effect waves-light btn" required="" aria-required="true" value="MASUK"></input>
					</div>
					<div class="col s12 kanan-text marg20-top">
						<b><span>Belum punya akun ? Daftar </span><a href="register.php">disini</a></b>
					</div>
				</div>
			</div>
	</form>
  </body>
</html>
<?php
  if(isset($_POST['email'])){
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $isUser = false;

    $query = mysqli_query($h, "SELECT * from user WHERE email_user = '$email' AND password_user = '$password'");
    $query2 = mysqli_query($h, "SELECT * from user WHERE email_user = '$email' AND password_user = '$password'");
		$data = mysqli_fetch_assoc($query2);
    // while($row = $query->fetch_array()){
    //   $isUser = true;
    // }
    // $query->num_rows

    if($query->num_rows!=0){
      $_SESSION['email'] = $email;
      $_SESSION['nama'] = $nama;
      $_SESSION['id'] = $data["id_user"];
      header("Location: index.php");
    }else {
      echo "<script type='text/javascript'>alert('Kombinasi email dan password salah !')</script>";
    }
  }
?>
