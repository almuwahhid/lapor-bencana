$('document').ready(function() {
  popup($('#close'), $('#popup-pilihpasar'));
  showUp($('#btn-search'), $('#popup-pilihpasar'), true);

  $('#btn-home').click(function(){
    new getAllPasar();
  });

  $('#input-search').keyup(function() {
    $('#table-search').empty();
    var data = "";
    console.log($(this).val());
    var index = 0;
    for(var a=0;a<data_pasar.length;a++){
      if(data_pasar[a].nama_pasar.indexOf($(this).val()) >= 0){
        var index = index+1;
        var temp =
        "<tr class='item-search pointer' onclick='setMapByPoint("+data_pasar[a].id_pasar+")'>"+
        "<td class='tengah-text' style='width:10px'>"+index+".</td>"+
        "<td class='col-xs-6'>"+data_pasar[a].nama_pasar+"</td>"+
        "<td class='col-xs-5'>"+data_pasar[a].nama_jenis+"</td>"+
        "</tr>";
        data+=temp;
      }
    }
    $('#table-search').append(data);
  });

  $('#btn-nearby').click(function(){
    new getNearby(myloc.lat, myloc.lng);
  });
});

// TODO: fungsi untuk tampil dan hide
function popup(btn, view){
  btn.click(function(){
    if(!view.is(':visible')){
      view.fadeIn();
    }else {
      view.fadeOut();
    }
  });
}

// TODO: fungsu untuk direct edit pasar
function editPasar(id){
  window.location.href = id;
}

function redirect(id){
  window.location.href = "BeritaDetail.php?id="+id;
}

function redirectPage(url){
  window.location.href = url;
}

function deleteImage(url){
  var x = confirm("Apakah Anda ingin menghapus data ini?");
  if(x){
    window.location.href = url;
  }
}

function redirectWithConfirm(url){
  var x = confirm("Apakah Anda ingin beralih ke halaman ini?");
  if(x){
    window.location.href = url;
  }
}

// TODO: fungsu untuk set peta berdasarkan klik pencarian pasar
function setMapByPoint(id){
  $('#popup-pilihpasar').fadeOut();
  new getOnePasar(id);
}

// TODO : digunakan untuk hide & show disertai ambil data pasar ketika buka
function showUp(btn, view){
  btn.click(function(){
    if(!view.is(':visible')){
      new getDataPasar();
      view.fadeIn();
    }else {
      view.fadeOut();
    }
  });
}

// TODO: Fungsi untuk callback fungsi showUp
var showUpCallback = function(result){
  $('#table-search').empty();
  if(data_pasar == undefined)
    data_pasar = result.result;
  var data = "";
  for(var a=0;a<data_pasar.length;a++){
    var index = a+1;
    var temp =
    "<tr class='item-search pointer' onclick='setMapByPoint("+data_pasar[a].id_pasar+")'>"+
    "<td class='tengah-text' style='width:10px'>"+index+".</td>"+
    "<td class='col-xs-6'>"+data_pasar[a].nama_pasar+"</td>"+
    "<td class='col-xs-5'>"+data_pasar[a].nama_jenis+"</td>"+
    "</tr>";
    data+=temp;
  }
  $('#table-search').append(data);
}


// TODO: Fungsi untuk mendapatkan lokasi kita
function getLocation(){
  this.location;
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position){
      // console.log(position.coords.latitude);
      // console.log(position.coords.longitude);
      this.location = JSON.parse('{"lat": '+position.coords.latitude+', "lng": '+position.coords.longitude+'}');
    });
  }
}
