<?php
$jumlah = mysqli_num_rows(mysqli_query($h, "SELECT * from informasi_bencana"));
$banyak_data = floor($jumlah/10)+1;
$limit = 0;
if(isset($_GET["r"])){
$active_list = $_GET["r"];
$first = ($_GET["r"]*10);
$limit = $first-10;

$query_berita = mysqli_query($h, "SELECT * from informasi_bencana
                                  ORDER BY tanggal_bencana AND jam_bencana ASC LIMIT 10 OFFSET ".$limit);
}else{
if($banyak_data>1){
    $query_berita = mysqli_query($h, "SELECT * from informasi_bencana
                                      ORDER BY tanggal_bencana AND jam_bencana ASC LIMIT 10");
  }else{
    $query_berita = mysqli_query($h, "SELECT * from informasi_bencana
                                      ORDER BY tanggal_bencana AND jam_bencana ASC");
  }
}
if($query_berita){
  $no = $limit;
}
?>
<div class="container">
  <div class="row marg15-top">

    <?php
    if($jumlah==0){
      ?>
      <div class="col s12 tengah-text title">
          Belum ada Galeri Bencana
      </div>
      <?php
    }else{
      while($row = $query_berita->fetch_array()){
        ?>
        <div class="bg w-100 card indigo lighten-5 pointer waves-effect centerHorizontal heightRect marg10-top" style="background-image:url('datas/<?php echo $row["judul_bencana"]; ?>.png')" onclick="redirectWithConfirm('http://maps.google.com/maps?q=<?php echo $row["lat_bencana"]?>,<?php echo $row["lng_bencana"]?>')">
          <div class="subs-detail w-100 pad10 tengah-text" style="opacity:0.6;background-color:white; color:black">
            <div class="w-100 spin marg5-top">
              <?php echo $row["tanggal_bencana"]; ?>, <?php echo $row["jam_bencana"]; ?>
            </div>
            <div class="w-100 marg5-top">
              <?php echo $row["judul_bencana"]; ?>
            </div>
          </div>
        </div>
        <?php
      }
    }?>

    <div class="col s12">
      <ul class="pagination kanan centerHorizontal">
        <?php
        if($banyak_data>1){
          for($i=1;$i<=$banyak_data;$i++){
            if(isset($active_list)){
              if($active_list==$i){
                echo '<li class="active"><a>'.$i.'</a></li>';
              }else{
                echo "<li class='waves-effect'><a href='?p=galeri&r=".$i."'>".$i."</a></li>";
              }
            }else{
              if($i==1){
                echo '<li class="active"><a>'.$i.'</a></li>';
              }else{
                echo "<li class='waves-effect'><a href='?p=galeri&r=".$i."'>".$i."</a></li>";
              }
            }
          }
        }
        ?>
      </ul>
    </div>
  </div>
</div>
