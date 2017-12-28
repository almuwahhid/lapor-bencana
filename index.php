<?php
require_once 'Koneksi.php';
session_start();
$a = false;
$b = false;
$c = false;
$d = false;
$e = false;

$koneksi = new Koneksi();
$h = $koneksi->connect();
if (!isset($_SESSION['email'])){
	header("Location: login.php");
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>HALAMAN PENGGUNA</title>
    <!-- <link href="css/bootstrap.min.css" rel="stylesheet"> -->
		<link href="css/materialize.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome.min.css">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Lobster|Open+Sans:400,400italic,300italic,300|Raleway:300,400,600' rel='stylesheet' type='text/css'>

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
  <body style="background-color:#E8E8E8">
		<?php include 'include/header.php'; ?>
		<div class="marg50-top w-100">
			<?php
			if(isset($_GET["p"])){
				switch ($_GET["p"]) {
					case 'berita':
					include 'pages/Berita.php';;
					break;
					case 'peta':
					include 'pages/RawanLongsor.php';;
					break;
					case 'galeri':
					include 'pages/Galeri.php';
					break;
					case 'setting':
					include 'pages/Setting.php';
					break;
				}
			}else{
				include 'pages/Home.php';;
			}
			?>
		</div>
  </body>
</html>
