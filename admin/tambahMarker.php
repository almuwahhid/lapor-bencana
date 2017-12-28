<div class="row" style="padding-bottom: 10px">
  <ol class="breadcrumb">
    <li><a href="home.php">
      <em class="fa fa-home"></em>
    </a></li>
    <li class="active">Tambah Lokasi Rawan Longsor</li>
  </ol>
</div><!--/.row-->
<div class="container col-lg-12">
  <div class="row">
    <div class="col-lg-12" id="map-canvas" style="height:300px"></div>
  </div>
  <div class="row" style="padding-top:10px">
    <form role="form" action="" method="post">
      <div class="panel panel-default">
        <div class="panel-heading">
          Tambah Lokasi Rawan Longsor
        </div>
        <div class="panel-body">
          <div class="col-lg-6" >
              <div class="form-group">
                <label>Latitude </label>
                <input class="form-control " type="text" name="judulBerita" id="latitude" value=""  disabled>
              </div>
              <div class="form-group">
                <label>Longitude </label>
                <input class="form-control " type="text" name="judulBerita" id="longitude" value="" disabled>
              </div>
          </div>
          <div class="col-lg-6" >
            <div class="form-group">
              <label>Nama Daerah</label>
              <input class="form-control " type="text" name="judulBerita" required>
            </div>
            <div class="form-group" style="padding-top:35px">
              <input class="btn btn-sm btn-primary" type="submit" name="tambahBerita" value="Simpan"/>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
