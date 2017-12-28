<?php
if(isset($_GET["p"])){
	switch ($_GET["p"]) {
    case 'berita':
      $b = true;
      break;
    case 'peta':
      $c = true;
      break;
    case 'galeri':
      $d = true;
      break;
    case 'setting':
      $e = true;
      break;
  }
}else{
  $a = true;
}
?>
<nav class="red navbar-fixed" style="position:fixed">
  <div class="text-tengah w-100" style="position:absolute;  font-family: 'Vibur', serif;">
    <span class="title-main centerHorizontal">SIGAP BENCANA LONGSOR</span>
  </div>
  <div class="nav-wrapper">
    <ul class="left">
      <li><a data-activates="slide-out" class="navbar-icon navbar-icon-font"><i class="material-icons white-text">format_align_justify</i></a></li>
    </ul>
  </div>
</nav>
<ul id="slide-out" class="side-nav red">
  <li><div class="user-view">
      <div style="height:150px; background-image:url('images/bg-icon.jpg')" class="bg">

      </div>
    </div></li>
  <li class="<?php if($a) echo "active"; ?>"><a class="waves-effect white-text" href="index.php"><i class="material-icons white-text">home</i>Home</a></li>
  <li class="<?php if($b) echo "active"; ?>"><a class="waves-effect white-text" href="?p=berita"><i class="material-icons white-text">library_books</i>Berita</a></li>
  <li class="<?php if($c) echo "active"; ?>"><a class="waves-effect white-text" href="?p=peta"><i class="material-icons white-text">map</i>Peta Rawan Longsor</a></li>
  <li class="<?php if($d) echo "active"; ?>"><a class="waves-effect white-text" href="?p=galeri"><i class="material-icons white-text">image</i>Galeri Bencana</a></li>
  <li><div class="divider"></div></li>
  <li><a class="subheader">Akun Saya</a></li>
  <li class="<?php if($e) echo "active"; ?>"><a class="waves-effect white-text" href="?p=setting"><i class="material-icons white-text">settings</i>Setting</a></li>
  <li><a class="waves-effect white-text" href="logout.php"><i class="material-icons white-text">power_settings_new</i>Logout</a></li>
</ul>
