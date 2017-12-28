  <?php
include 'koneksi.php';
session_start();
date_default_timezone_set("Asia/Bangkok");
$idAdmin=$_SESSION['username_admin'];
if (isset($_POST['tambahBerita'])) {
  $judul=$_POST['judulBerita'];
  $isi=$_POST['isiBerita'];
  $id_kondisi=$_POST['tingkatKerusakan'];
  $meninggal=$_POST['meninggal'];
  $luka=$_POST['luka'];
  $tanggal=date("Y-m-d");
  $waktu=date("H:i:s");
  $alamat=$_FILES['gambar']['tmp_name'];
  $sqlIsiBerita= mysqli_query($koneksi,"INSERT INTO berita ( id_admin,id_tingkat_kerusakan, judul_berita, isi_berita, tanggal_berita, waktu_berita,jumlah_meninggal, jumlah_luka) VALUES ('$idAdmin','$id_kondisi', '$judul', '$isi','$tanggal', '$waktu','$meninggal','$luka')");
  if ($sqlIsiBerita) {
      // untuk pindah gambar
    move_uploaded_file($alamat,"images/$judul");
    ?>
    <script type="text/javascript">
      // alert("berhasil tambah berita");
      window.location.href="home.php?page=berita";
    </script>
    <?php
  }else {
    echo "string";
  }
}

if (isset($_GET['hapusBerita'])) {
  $id=$_GET['hapusBerita'];
  $del=mysqli_query($koneksi,"DELETE FROM berita WHERE id_berita='$id'");
  if ($del) {
    ?>
    <script type="text/javascript">
      // alert("berhasil hapus berita");
      window.location.href="home.php?page=berita";
    </script>
    <?php
  }else {
    ?>
      <script language="javascript">
      alert ("Berita Gagal Di Hapus"); document.location="home.php?page=berita";
      </script>
    <?php
  }
}

if (isset($_POST['editBerita'])) {
  $id=$_POST['id'];
  $judul=$_POST['judulBerita'];
  $file_name=$_POST['judulBerita'].".png";
  $kerusakan=$_POST['tingkatKerusakan'];
  $isi=$_POST['isiBerita'];
  $tanggal=date("Y-m-d");
  $waktu=date("H:i:s");
  $alamat=$_FILES['gambar']['tmp_name'];
  $sqlIsiBerita= mysqli_query($koneksi,"UPDATE berita SET id_admin='$idAdmin',id_tingkat_kerusakan='$kerusakan',judul_berita='$judul',isi_berita='$isi',tanggal_berita='$tanggal',waktu_berita='$waktu' WHERE id_berita=$id");
  if ($sqlIsiBerita) {
    if(file_exists("images/$file_name")) {
    // chmod($judul,0755); //Change the file permissions if allowed
    unlink("images/$file_name"); //remove the file
    }
    // untuk pindah gambar
    move_uploaded_file($alamat,"images/$file_name");
    ?>
    <script type="text/javascript">
      // alert("berhasil edit berita");
      window.location.href="home.php?page=berita";
    </script>
    <?php
  }else {
    ?>
      <script language="javascript">
      alert ("Berita Gagal edit"); document.location="home.php?page=berita";
      </script>
    <?php
  }
}

if ($_GET['logout']=="true") {
  session_start();
  session_destroy();
  ?>
  <script type="text/javascript">
     window.location.href = "login.php";
  </script>
  <?php
}
 ?>
