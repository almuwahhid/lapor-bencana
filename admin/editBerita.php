<?php
  include 'koneksi.php';
  $id=$_GET['id'];
  $sql=mysqli_query($koneksi,"SELECT b.*, t.nama_tingkat_kerusakan FROM berita b, tingkat_kerusakan t WHERE b.id_tingkat_kerusakan = t.id_tingkat_kerusakan AND b.id_berita=$id") or die(mysqli_error());
  $data=mysqli_fetch_array($sql);
 ?>
<div class="row" style="padding-bottom: 10px">
  <ol class="breadcrumb">
    <li><a href="home.php">
      <em class="fa fa-home"></em>
    </a></li>
    <li class="active">Edit Berita</li>
  </ol>
</div><!--/.row-->
<div class="col-lg-12">
  <form enctype="multipart/form-data"  role="form" action="proses.php" method="post">
    <input type="hidden" name="id" value="<?php echo $id;?>">
    <div class="form-group">
      <label>Judul Berita</label>
      <input class="form-control" type="text" name="judulBerita" value="<?php echo $data[3];?>">
    </div>
    <div class="form-group">
      <label>Isi</label>
      <textarea class="ckeditor" id="ckedtor" type="" name="isiBerita"><?php echo $data[4];?></textarea>
    </div>
    <div class="form-group col-lg-3">
      <label>Jumlah Korban Meninggal</label>
      <input class="form-control" type="text" name="meninggal" value="<?php echo $data[7];?>" required>
    </div>
    <div class="form-group col-lg-3">
      <label>Jumlah Korban luka</label>
      <input class="form-control" type="text" name="luka" value="<?php echo $data[8];?>" required>
    </div>
    <div class="form-group col-lg-3">
      <label>Tingkat Kerusakan</label>
      <select class="form-control" name="tingkatKerusakan" required>
        <?php
        $sql=mysqli_query($koneksi,"SELECT * FROM tingkat_kerusakan");
        while($dataDD=mysqli_fetch_array($sql)){
          ?>
          <option <?php if($data[2]==$dataDD[0])echo 'selected'; ?> value="<?php echo $dataDD[0]?>"><?php echo $dataDD[1] ?></option>
          <?php
        }
        ?>
      </select>
    </div>
    <div class="form-group col-lg-3">
			<label>Pilih Gambar</label>
      <input name="gambar" type="file" required/>
		</div>
    <div class="form-group col-lg-12">
      <input class="btn btn-sm btn-warning" type="submit" name="editBerita" value="Edit"/>
      <a href="proses.php?hapusBerita=<?php echo $data[0];?>" onclick="return confirm('Apakah anda yakin inngin menghapus berita?')">
        <input class="btn btn-sm btn-danger" type="button" name="hapusBerita" value="Hapus"/>
      </a>
    </div>
  </form>
</div>
