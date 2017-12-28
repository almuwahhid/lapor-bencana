<?php
require_once 'Koneksi.php';
session_start();

$koneksi = new Koneksi();
$h = $koneksi->connect();
if (!isset($_SESSION['email'])){
	header("Location: login.php");
}
$email = $_SESSION['email'];
$hasil = mysqli_query($h, "SELECT * from user
																	WHERE email_user = '$email'");

$data = mysqli_fetch_assoc($hasil);

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
    <!-- <script src="js/marker.js"></script> -->
    <!-- <script src="js/map.js"></script> -->
    <script src="js/style.js"></script>
    <script src="js/controller.js"></script>
    <script src="js/TambahLaporanController.js"></script>
  </head>
  <body style="background-color:#E8E8E8">
    <nav class="red navbar-fixed" style="position:fixed">
      <div class="nav-wrapper">
        <ul class="left">
          <li><a href="index.php" class="navbar-icon-font"><i class="material-icons white-text">arrow_back</i></a></li>
        </ul>
        <div class="col">
          <span class="white-text subs-detail">Tambah Laporan Bencana</span>
        </div>
      </div>
    </nav>
    <div class="w-100 pad10-top-bot marg50-top">
      <div class="row">
				<form class="" action="" method="post" enctype="multipart/form-data">
					<input type="hidden" class="validate" name="id_user" value="<?php echo $_SESSION['id'] ?>">
					<input id="lat" style="width:300px" type="hidden" class="validate" name="lat">
					<input id="lng" style="width:300px" type="hidden" class="validate" name="lng">
					<label for="file-input" class="w-100">
						<div id="image_foto" style="background-image:url('images/camera.png')" id="image" class="pointer card waves-effect col s6 m3 centerHorizontal heightRect bg">
						</div>
					</label>
					<input id="file-input" type="file" style="visibility:hidden" name="file_input" />
					<div class="input-field marg5-top centerHorizontal" style="width:300px">
						<input id="nama" type="text" class="validate" disabled name="nama" value="<?php echo $data["nama_user"] ?>">
						<label for="nama">Nama</label>
					</div>
					<div class="input-field marg5-top centerHorizontal" style="width:300px">
						<input id="email" type="text" class="validate" disabled name="email" value="<?php echo $data["email_user"] ?>">
						<label for="email">Email</label>
					</div>
					<div class="input-field marg5-top centerHorizontal" style="width:300px">
						<input id="lokasi" type="text" class="validate" disabled value="101.0293, -7.09029" name="lokasi">
						<label for="lokasi">Lokasi</label>
					</div>
					<div class="input-field marg5-top centerHorizontal" style="width:300px">
						<input id="judul" type="text" class="validate" name="judul" value="">
						<label for="judul">Highlight Bencana</label>
					</div>
					<div class="input-field marg5-top centerHorizontal" style="width:300px">
						<textarea id="keterangan" class="materialize-textarea" class="validate" name="keterangan"></textarea>
						<label for="keterangan">Keterangan</label>
					</div>
					<div class="input-field w-100 marg5-top tengah-text">
						<input type="submit" style="width:300px" class="red waves-effect waves-light btn" required="" aria-required="true" value="KIRIM LAPORAN"></input>
					</div>
				</form>
      </div>
    </div>
  </body>
</html>
<?php
if(isset($_POST['id_user']) && !empty($_FILES["file_input"]["name"])){
	date_default_timezone_set("Asia/Bangkok");
	$id_user = $_POST['id_user'];
	$nama = $_POST['nama'];
	$judul = $_POST['judul'];
	$email = $_POST['email'];
	$lat = $_POST['lat'];
	$lng = $_POST['lng'];
	$tanggal = date("Y-m-d");
	$waktu = date("H:i:s");
	$keterangan = $_POST['keterangan'];
	$name_file = $_FILES["file_input"]["name"];
	$tmp_file = $_FILES['file_input']['tmp_name'];
	$type_file = end(explode('.',$name_file));

	$nama_file = $judul.".png";
	$path = "datas/".$nama_file;

	$hasil=mysqli_query($h, "INSERT INTO informasi_bencana(id_user, judul_bencana, lat_bencana, lng_bencana, keterangan_bencana, tanggal_bencana, jam_bencana)
                            values('$id_user', '$judul', '$lat', '$lng', '$keterangan', '$tanggal', '$waktu')");
  if($hasil){
		if(move_uploaded_file($tmp_file, $path)){
			echo "
          <script>
          window.alert('Berhasil Kirim Laporan');
          </script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php'>";
		}
 }
}
?>
