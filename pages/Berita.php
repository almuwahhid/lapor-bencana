<?php
$jumlah = mysqli_num_rows(mysqli_query($h, "SELECT * from berita"));
$banyak_data = floor($jumlah/10)+1;
$limit = 0;
if(isset($_GET["r"])){
$active_list = $_GET["r"];
$first = ($_GET["r"]*10);
$limit = $first-10;

$query_berita = mysqli_query($h, "SELECT * from berita
                                  JOIN tingkat_kerusakan ON berita.id_tingkat_kerusakan = tingkat_kerusakan.id_tingkat_kerusakan
                                  ORDER BY berita.tanggal_berita AND berita.waktu_berita ASC LIMIT 10 OFFSET ".$limit);
}else{
if($banyak_data>1){
    $query_berita = mysqli_query($h, "SELECT * from berita
                                      JOIN tingkat_kerusakan ON berita.id_tingkat_kerusakan = tingkat_kerusakan.id_tingkat_kerusakan
                                      ORDER BY berita.tanggal_berita AND berita.waktu_berita ASC LIMIT 10");
  }else{
    $query_berita = mysqli_query($h, "SELECT * from berita
                                      JOIN tingkat_kerusakan ON berita.id_tingkat_kerusakan = tingkat_kerusakan.id_tingkat_kerusakan
                                      ORDER BY berita.tanggal_berita AND berita.waktu_berita ASC");
  }
}
if($query_berita){
  $no = $limit;
}

?>
<a href="TambahLaporan.php" style="position:fixed;z-index:2" class="parentEndRight btn-floating btn-large waves-effect waves-light red"><i class="material-icons">add</i></a>
<div class="container">
  <div class="row marg15-top" style="padding-right:15px">
    <?php
    if($jumlah==0){
      ?>
      <div class="col s12 tengah-text title">
          Belum ada berita tersedia
      </div>
      <?php
    }else{
      while($row = $query_berita->fetch_array()){
        ?>
        <div class="col s12 m6 card pointer waves-effect centerHorizontal" style="padding-top:10px;padding-bottom:10px;" onclick="redirect(<?php echo $row['id_berita'] ?>)">
          <div class="w-100 heightThird bg" style="background-image:url('admin/images/<?php echo $row['judul_berita'] ?>.png')">
          </div>
          <div class="w-100 marg10-top">
            <div class="w-50 spin">
              <i class="material-icons" style="font-size:12px">date_range</i>
              <?php echo $row["tanggal_berita"]; ?>
            </div>
            <div class="col s6 spin kanan-text">
              <i class="material-icons" style="font-size:12px">access_time</i>
              <?php echo $row["waktu_berita"]; ?>
            </div>
          </div>
          <div class="w-100 tengah-text title">
            <?php echo $row["judul_berita"]; ?>
          </div>
        </div>
        <?php
      }
    }
    ?>
    <div class="col s12">
      <ul class="pagination kanan centerHorizontal">
        <?php
        if($banyak_data>1){
          for($i=1;$i<=$banyak_data;$i++){
            if(isset($active_list)){
              if($active_list==$i){
                echo '<li class="active"><a>'.$i.'</a></li>';
              }else{
                echo "<li class='waves-effect'><a href='?r=".$i."'>".$i."</a></li>";
              }
            }else{
              if($i==1){
                echo '<li class="active"><a>'.$i.'</a></li>';
              }else{
                echo "<li class='waves-effect'><a href='?r=".$i."'>".$i."</a></li>";
              }
            }
          }
        }
        ?>
      </ul>
    </div>
  </div>
</div>
