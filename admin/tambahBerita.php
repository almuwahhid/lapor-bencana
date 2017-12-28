<div class="row" style="padding-bottom: 10px">
  <ol class="breadcrumb">
    <li><a href="home.php">
      <em class="fa fa-home"></em>
    </a></li>
    <li class="active">Tambah Berita</li>
  </ol>
</div><!--/.row-->
<div class="col-lg-12">
  <form enctype="multipart/form-data" role="form" action="proses.php" method="post">
    <div class="form-group">
      <label>Judul Berita</label>
      <input class="form-control" type="text" name="judulBerita" required>
    </div>
    <div class="form-group">
      <label>Isi</label>
      <textarea class="ckeditor" id="ckedtor" type="" name="isiBerita" required></textarea>
    </div>
    <div class="form-group col-lg-3">
      <label>Jumlah Korban Meninggal</label>
      <input class="form-control" type="text" name="meninggal" required>
    </div>
    <div class="form-group col-lg-3">
      <label>Jumlah Korban luka</label>
      <input class="form-control" type="text" name="luka" required>
    </div>
    <div class="form-group col-lg-3">
      <label>Tingkat Kerusakan</label>
      <select class="form-control" name="tingkatKerusakan" required>
        <option value="">Pilih Tingkat Kerusakan</option>
        <?php
        include 'koneksi.php';
        $sql=mysqli_query($koneksi,"SELECT * FROM tingkat_kerusakan");
        while($data=mysqli_fetch_array($sql)){
          ?>
          <option value="<?php echo $data[0]?>"><?php echo $data[1] ?></option>
          <?php
        }
        ?>
      </select>
    </div>
    <div class="form-group col-lg-3">
			<label>Pilih Gambar</label>
      <input name="gambar" type="file" />
		</div>
    <div class="form-group col-lg-12">
      <input class="btn btn-sm btn-primary" type="submit" name="tambahBerita" />
    </div>
  </form>
</div>
