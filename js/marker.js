var marker = function(map){
  this.markers = [];
  this.map = map;
  this.a = 200;
  this.addMarker = function(location, judul, logo, id) {
    var marker = new google.maps.Marker({
      position : location,
      content : id,
      icon : logo,
      title : judul,
      map : this.map
    });
    this.markers.push(marker);
    marker.addListener('click', function() {
      map.setZoom(13);
      map.setCenter(marker.getPosition());
      if(marker.content == 0){
        info_window = new google.maps.InfoWindow({
          content: '<div class="tengah-text" style="width:200px"><h3>Lokasiku</h3></div>',
        });

      }else{
        info_window = new google.maps.InfoWindow({
          content: window_konten(marker),
        });
      }
      info_window.open(this.map, marker);
    });

    function window_konten(marker){
      konten =
      '<div style="width:400px">'+
      '<div class="col-md-12" id="gbr" style="background-image:'+"url('assets/"+marker.content+".jpg'"+')">'+
      '</div>'+
      '<div class="col-md-12" style="text-align:center">'+
      '<h3>'+
      marker.title+
      '</h3>'+
      '</div>'+
      '<div class="col-md-12 tengah-text">'+
      '<a id="btn-nearby" class="icon-navbar no-outline" href="detail.php?id='+marker.content+'"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>'+
      '</div>'+
      '</div>';
      return konten;
    };
  };
  // this.window_konten = function(marker){
  //   konten =
  //   '<div style="width:400px">'+
  //   '<div class="col-md-12" id="gbr" style="background-image:'+"url('images/"+marker.content+".jpg'"+')">'+
  //   '</div>'+
  //   '<div class="col-md-12" style="text-align:center">'+
  //   '<h3>'+
  //   marker.title+
  //   '</h3>'+
  //   '</div>'+
  //   '<div class="col-md-12">'+
  //
  //   '</div>'+
  //   '</div>';
  // };


  this.setMapOnAll = function(map){
    console.log("ini"+map);
    console.log("itu"+this.markers.length);
    for (var i = 0; i < this.markers.length; i++) {
      this.markers[i].setMap(map);
    }
  }
};
