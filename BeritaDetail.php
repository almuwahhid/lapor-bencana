<?php
require_once 'Koneksi.php';
session_start();

$koneksi = new Koneksi();
$h = $koneksi->connect();
if (!isset($_SESSION['email'])){
	header("Location: login.php");
}
	$id=$_GET['id'];
  $hasil=mysqli_query($h, "SELECT * from berita
	                                  JOIN tingkat_kerusakan ON berita.id_tingkat_kerusakan = tingkat_kerusakan.id_tingkat_kerusakan
																		WHERE berita.id_berita = '$id'");

	$data=mysqli_fetch_assoc($hasil);
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
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
  <body style="background-color:#E8E8E8">
    <nav class="red navbar-fixed" style="position:fixed">
      <div class="nav-wrapper">
        <ul class="left">
          <li><a href="index.php?p=berita" class="navbar-icon-font"><i class="material-icons white-text">arrow_back</i></a></li>
        </ul>
        <div class="col">
          <span class="white-text subs-detail">Detail Berita</span>
        </div>
      </div>
    </nav>
    <div class="w-100 marg50-top">
      <div class="row">
				<div class="col s12 bg heightHalf" style="background-image:url('admin/images/<?php echo $data["judul_berita"]; ?>.png')">

				</div>
        <div class="col s12 tengah-text marg10-top">
          <span class="subs-detail" style="color:black"><?php echo $data["judul_berita"]; ?></span>
        </div>
        <div class="col s12 spin marg5-top">
          <?php echo $data["tanggal_berita"].", ".$data["waktu_berita"] ; ?>
        </div>
        <div class="col s12 marg10-top" style="text-align:justify">
          <p style="text-indent:30px;">
            <?php echo $data["isi_berita"]; ?>
          </p>
        </div>
				<div class="col s12 marg10-top">
          <table class="bordered">
              <thead>
                <tr>
                    <th class="col s12 tengah-text">Tingkat Kerusakan</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="col s12 pad30 tengah-text"><?php echo $data["nama_tingkat_kerusakan"]; ?></td>
                </tr>
              </tbody>
            </table>
        </div>
        <div class="col s12 marg20-top">
          <table class="bordered">
              <thead>
                <tr>
                    <th class="col s6 tengah-text">Korban Luka</th>
                    <th class="col s6 tengah-text">Korban Meninggal</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="col s6 pad30 tengah-text"><?php echo $data["jumlah_meninggal"]; ?></td>
                  <td class="col s6 pad30 tengah-text"><?php echo $data["jumlah_luka"]; ?></td>
                </tr>
              </tbody>
            </table>
        </div>
      </div>
    </div>
  </body>
</html>
