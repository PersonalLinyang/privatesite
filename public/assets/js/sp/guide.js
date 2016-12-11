//Google地図表示
var map;
function initMap() {
  map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: 35.4392112, lng: 139.627068},
    mapTypeControl: false,
    zoom: 20
  });
  var marker = new google.maps.Marker({
      map: map,
      position: new google.maps.LatLng(35.4392112, 139.627068),
      title:"タンタンメン本舗",
  });
}

$(document).ready(function() {
  //「地図で確認」機能
  $("#map-link").click(function() {
    $("html, body").animate({
      scrollTop: $($(this).attr("href")).offset().top + "px"
    }, {
      duration: 500,
      easing: "swing"
    });
    return false;
  });

  //当店写真Colorbox
  $('a[rel^=colorbox-]').colorbox({
    maxWidth: "80%",
    maxHeight: "70%",
    opacity: 0.7
  });
});