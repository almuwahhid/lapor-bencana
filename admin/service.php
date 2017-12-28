<?php
  include 'koneksi.php';

  $json_result = array();
  $json_result["result"] = array();
  $sql= mysqli_query($koneksi,"SELECT * FROM lokasi_rawan");
  while ($row = $sql->fetch_array(MYSQLI_ASSOC)) {
    $lokasi = array();
    $lokasi["id_peta"] = $row["id_peta"];
    $lokasi["nama_daerah"] = $row["nama_daerah"];
    $lokasi["lat_daerah"] = $row["lat_daerah"];
    $lokasi["lng_daerah"] = $row["lng_daerah"];
    array_push($json_result["result"], $lokasi);
  }
  echo json_encode($json_result);
?>
