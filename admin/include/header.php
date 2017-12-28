<?php
$a = false;
$b = false;
$c = false;
$d = false;
if(!isset($_SESSION['username_admin'])){
	header("Location: login.php");
}

if(isset($_GET["page"])){
	switch ($_GET["page"]) {
    case 'berita':
			$b = true;
      break;
    case 'tambahBerita':
      $c = true;
      break;
    case 'tambahLokasi':
      $d = true;
      break;
  }
}else{
  $a = true;
}
?>
<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span></button>
      <a class="navbar-brand" href="#"><span>Admin</span>Longsor</a>
    </div>
  </div><!-- /.container-fluid -->
</nav>
<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
  <div class="profile-sidebar">
    <div class="profile-usertitle">
      <div class="profile-usertitle-name" style="text-align:center">Username</div>
    </div>
    <div class="clear"></div>
  </div>
  <div class="divider"></div>
  <ul class="nav menu">
    <li <?php if($a) echo "class='active'"; ?>><a href="home.php"><em class="fa fa-home">&nbsp;</em> Beranda</a></li>
    <li class="parent "><a data-toggle="collapse" href="#sub-item-1">
      <em class="fa fa-navicon">&nbsp;</em> Berita <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
      </a>
      <ul class="children <?php if(!$b & !$c) echo 'collapse'; ?>" id="sub-item-1">
        <li <?php if($b) echo "class='active'"; ?>><a class="" href="home.php?page=berita">
          <span class="fa fa-arrow-right">&nbsp;</span> Tampil Berita
        </a></li>
        <li <?php if($c) echo "class='active'"; ?>><a class="" href="home.php?page=tambahBerita">
          <span class="fa fa-arrow-right">&nbsp;</span> Tambah Berita
        </a></li>
      </ul>
    </li>
    <li <?php if($d) echo "class='active'"; ?>><a href="home.php?page=tambahLokasi"><em class="fa fa-map-marker">&nbsp;</em> Lokasi Longsor</a></li>
    <li><a href="proses.php?logout=true"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
  </ul>
</div><!--/.sidebar-->
