var map;
function initMap() {
  map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: 35.4392222, lng: 139.627067},
    zoom: 19
  });
  var marker = new google.maps.Marker({
      map: map,
      position: new google.maps.LatLng(35.4392222, 139.627067),
  });
}