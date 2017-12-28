// TODO: Fungsi untuk ambil data semua pasar dari db untuk titik lokasi
function getAllPasar(){
  this.datas;
  $.ajax({
    method: "GET",
    beforeSend: function() {
      $("#loading").fadeIn(1000);
    },
    url: "backend/get-all-pasar.php",
    data: {}
  }).done(function(result) {
    $("#loading").fadeOut();
    this.datas = result;
    // console.log(JSON.parse(this.datas));
    allpasarCallback(JSON.parse(this.datas));
  });
}

// TODO: Fungsi untuk ambil data semua pasar dari db untuk menu pencarian
function getDataPasar(){
  this.datas;
  $.ajax({
    method: "GET",
    beforeSend: function() {
      $("#loading").fadeIn(1000);
    },
    url: "backend/get-all-pasar.php",
    data: {}
  }).done(function(result) {
    $("#loading").fadeOut();
    this.datas = result;
    // console.log(JSON.parse(this.datas));
    showUpCallback(JSON.parse(this.datas));
  });
}

// TODO: Fungsi untuk ambil data semua pasar di sekitar pengguna
function getNearby(lat, lng){
  this.datas;
  console.log(lat+" "+lng);
  $.ajax({
    method: "GET",
    beforeSend: function() {
      $("#loading").fadeIn(1000);
    },
    url: "backend/get-nearby-pasar.php?lat="+lat+"&lng="+lng,
    data: {}
  }).done(function(result) {
    $("#loading").fadeOut();
    this.datas = result;
    console.log(JSON.parse(this.datas));
    allpasarCallback(JSON.parse(this.datas));
  });
}

// TODO: Fungsi untuk ambil satu data pasar
function getOnePasar(id){
  this.datas;
  console.log(id);
  $.ajax({
    method: "GET",
    beforeSend: function() {
      $("#loading").fadeIn(1000);
    },
    url: "backend/get-one-pasar.php?id_pasar="+id,
    data: {}
  }).done(function(result) {
    $("#loading").fadeOut();
    this.datas = result;
    console.log(JSON.parse(this.datas));
    allpasarCallback(JSON.parse(this.datas));
  });
}
