<?php
  $email = $_SESSION['email'];
  $hasil=mysqli_query($h, "SELECT * from user
																		WHERE email_user = '$email'");

	$data=mysqli_fetch_assoc($hasil);
?>
<div class="container">
  <div class="w-100 pad10-top-bot">
    <div class="row">
      <form class="" action="" method="post">
        <div class="input-field w-100 marg5-top">
          <input id="nama" type="text" required="" class="validate" name="nama" value="<?php echo $data["nama_user"] ?>">
          <label for="nama">Nama</label>
        </div>
        <div class="input-field w-100 marg5-top">
          <input id="email" type="text" required="" class="validate" name="email" value="<?php echo $data["email_user"] ?>">
          <label for="email">Email</label>
        </div>
        <div class="input-field w-100 marg5-top">
          <input id="alamat" type="text" required="" class="validate" name="alamat" value="<?php echo $data["alamat_user"] ?>">
          <label for="alamat">Alamat</label>
        </div>
        <div class="input-field w-100 marg5-top">
          <input id="password" type="password" type="text" required="" class="validate" name="paswordlama">
          <label for="password">Password Lama</label>
        </div>
        <div class="input-field w-100 marg5-top">
          <input id="newpassword" type="password" type="text" required="" class="validate" name="paswordbaru">
          <label for="newpassword">Password Baru</label>
        </div>
        <div class="input-field w-100 marg5-top tengah-text">
          <input type="submit" style="width:300px" class="red waves-effect waves-light btn" required="" aria-required="true" value="UBAH PROFIL"></input>
        </div>
      </form>
    </div>
  </div>
</div>
<?php
  if(isset($_POST['nama'])){
    $id_user = $_SESSION['id'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $p_lama = md5($_POST['paswordlama']);
    $p_baru = md5($_POST['paswordbaru']);
    $email = $_POST['email'];

    $hasil=mysqli_query($h, "SELECT * from user
  																		WHERE id_user = '$id_user'");
    $data=mysqli_fetch_assoc($hasil);
    if($data["password_user"] == $p_lama){
      $q=mysqli_query($h, "UPDATE user SET nama_user = '".$nama."', password_user = '".$p_baru."', alamat_user = '".$alamat."', email_user = '".$email."' WHERE id_user= ".$id_user);
      if($q){
        echo "
            <script>
            window.alert('Berhasil mengubah info pengguna');
            </script>";
        echo "<meta http-equiv='refresh' content='0; url=logout.php'>";
      }
    }else{
      echo "
          <script>
          window.alert('Password Anda Salah');
          </script>";
    }
  }
?>
