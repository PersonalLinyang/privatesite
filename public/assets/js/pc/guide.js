//Google地図表示
var map;
function initMap() {
  map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: 35.4392222, lng: 139.627067},
    zoom: 19
  });
  var marker = new google.maps.Marker({
      map: map,
      position: new google.maps.LatLng(35.4392722, 139.627117),
  });
}

//「地図で確認」機能
$(document).ready(function() {
  $("#map-link").click(function() {
    $("html, body").animate({
      scrollTop: $($(this).attr("href")).offset().top + "px"
    }, {
      duration: 500,
      easing: "swing"
    });
    return false;
  });
});