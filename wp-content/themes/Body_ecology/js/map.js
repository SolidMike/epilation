if( $('#map').length){
  google.maps.event.addDomListener(window, 'load', initMap);

  var data = $('#location').html(),
    locations_json = $.parseJSON(data),
    markerImage = $('#marker').text()
  function initMap() {
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 16,
      center: new google.maps.LatLng(48.0019787, 37.8028568),
      disableDefaultUI: true,
      mapTypeId: google.maps.MapTypeId.ROADMAP,
    });

    setMarkers(map);
  }

  function setMarkers(map) {
    // Область показа маркеров
    var markersBounds = new google.maps.LatLngBounds();
    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    for (i = 0; i < locations_json.length; i++) {
      var markerPosition = new google.maps.LatLng(locations_json[i].coordinates[0],locations_json[i].coordinates[1]);
      
      // Добавляем координаты маркера в область
      markersBounds.extend(markerPosition);
      
      // Создаём маркер
      marker = new google.maps.Marker({
        position: markerPosition,
        map: map,
        icon: '/img/marker.svg',
        title: locations_json[i].title,
      });
      
      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations_json[i].title);
          infowindow.open(map, marker);
        }
      })(marker, i));
    }
    
    if(locations_json.length >= 2){
      // Центрируем и масштабируем карту, если больше 2х меток
      map.setCenter(markersBounds.getCenter(), map.fitBounds(markersBounds));
    }else{
      // Центрируем карту
      map.setCenter(markersBounds.getCenter());
    }
  }
}