var map;
var markers = [];
var datas;


// var data = [
// 	{"lat":-7.7985183, "lng":110.4028787},
// 	{"lat":-7.7832014, "lng":110.4116575}
// ];
var lokasi;
var __global_user		 = false;
var markeruser = "";

// var judul = ["Lokasi A", "Lokasi B"]
var initialize = function() {
	/* setup map */
	var mapOptions = {
		zoom: 12,
		center: new google.maps.LatLng(-8.1018832, 111.0225606)
	};


	// TODO: peta.php : setup peta
	map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
	console.log("tes"+map);
	/* create marker and line by click */
	google.maps.event.addListener(map, 'click', function(event)
	{
		icons = 'images/map-pin.png';
		var location = event.latLng;

		lokasi={"lat":location.lat(),"lng":location.lng()};

		if(__global_user == false){
			markeruser = new google.maps.Marker({
				position: location,
				map : map,
				icon : icons,
				draggable: true,
				title: 'Drag untuk memindah',
			});
			__global_user = true;

		}else{
			markeruser.setPosition(location);
		}
		document.getElementById("latitude").value=markeruser.position.lat();
		document.getElementById("longitude").value=markeruser.position.lng();
	});
	google.maps.event.addListener(markeruser, 'dragend', function()
	{
		document.getElementById("latitude").value=markeruser.position.lat();
		document.getElementById("longitude").value=markeruser.position.lng();
		// geocodePosition(marker.getPosition());
	});

	// handle click and dblclick same time
	google.maps.event.addListener(this.map, 'dblclick', function(event) {

	});

	// Adds a marker to the map and push to the array.
	function addMarker(location) {
		var marker = new google.maps.Marker({
			position: location,
			map: map
		});
		markers.push(marker);
	}


	console.log(markers.length);
	for (var i = 0; i < this.markers.length; i++) {
      this.markers[i].setMap(map);
    }
}

// inisialisasi map saat load
google.maps.event.addDomListener(window, 'load', initialize);

function loadMarker(datas){
	// set data lokasi ke peta
	for(var a=0;a<datas.length;a++){
		var marker;
		console.log(datas[a]);
		marker = new google.maps.Marker({
			icon : 'images/marker.png',
			position : JSON.parse('{"lat": '+datas[a].lat_daerah+', "lng": '+datas[a].lng_daerah+'}'),
			title : datas[a].nama_daerah,
			content : datas[a].id_peta,
			map : this.map
		});
		markers.push(marker);

    // Listener untuk event click
		marker.addListener('click', function() {
      map.setZoom(15);
      map.setCenter(this.getPosition());
			info_window = new google.maps.InfoWindow({
				content: '<div class="col-md-4 tengah-text">'+
										'<div class="col-md-100 tengah-text"><h4>'+marker.title+'</h4></div>'+
										'<div class="col-md-100 tengah-text"><a onclick="return confirm('+"'"+'Apakah Anda ingin menghapus data ini?'+"'"+');" href="hapusMarker.php?id='+marker.content+'" class="btn btn-sm btn-primary">Hapus</a></div>'+
									'</div>',
			});
      info_window.open(this.map, this);
    });
		marker.setMap(map);
	}
}

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
      '<a id="btn-rute" class="icon-navbar no-outline" href="detail.php?id='+marker.content+'"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></a> &nbsp;&nbsp;&nbsp;'+
      '<a id="btn-nearby" class="icon-navbar no-outline" href="detail.php?id='+marker.content+'"><i class="fa fa-info-circle" aria-hidden="true"></i></a>'+
      '</div>'+
      '</div>';
      return konten;
    };

$.ajax({
    method: "GET",
    beforeSend: function() {

    },
    url: "service.php",
    data: {}
  }).done(function(result) {
    this.datas = JSON.parse(result);
    console.log(this.datas.result);
		loadMarker(this.datas.result);
  });
