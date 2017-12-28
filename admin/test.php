<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form enctype="multipart/form-data" method="post" action="proses.php">
        Send this file: <input name="gambar" type="file" /><br />
        <input type="submit" name="tambahBerita" />
    </form>
    <img src="images/i" alt="">
  </body>
</html>
<?php
    if (isset($_POST['submit'])) {
      $nama = "coba";
      $alamat=$_FILES['gambar']['tmp_name'];
      // move_uploaded_file($alamat,"images/coba2");
      // move_uploaded_file($alamat,"images/$nama");

    }else {
      echo "string";
    }
?>
