$('document').ready(function() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position){
      // console.log(position.coords.latitude);
      // console.log(position.coords.longitude);
      $('#lokasi').val(position.coords.latitude+", "+position.coords.longitude);
      $('#lat').val(position.coords.latitude);
      $('#lng').val(position.coords.longitude);
      // this.location = JSON.parse('{"lat": '+position.coords.latitude+', "lng": '+position.coords.longitude+'}');
    });
  }

  $("#file-input").on("change",gotPic);
  desiredWidth = window.innerWidth;

  if(!("url" in window) && ("webkitURL" in window)) {
    window.URL = window.URL;
  }

  function gotPic(event) {
        if(event.target.files.length == 1 &&
           event.target.files[0].type.indexOf("image/") == 0) {
            $('#image_foto').css('background-image', 'url(' + URL.createObjectURL(event.target.files[0])+ ')');
            console.log(URL.createObjectURL(event.target.files[0]));
            // $('#image_foto').css('background-image', 'url(' + imageUrl + ')');
            // $("#image_foto").attr("src", URL.createObjectURL(event.target.files[0]));
        }
	}
});
