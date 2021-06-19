var lat_def = 35.505256;
var lng_def = 27.116092;
if ($("meta[name=lat]").attr("content") !== '') {
  lat_def = Number($("meta[name=lat]").attr("content"));
}
if ($("meta[name=lng]").attr("content") !== '') {
  lng_def = Number($("meta[name=lng]").attr("content"));
}

function map() {
  var map = new google.maps.Map(document.getElementById('place-map'), {
    center: {
      lat: lat_def,
      lng: lng_def
    },
    zoom: 13,
    scrollwheel: false,
    height: 300,
  });
  var input = (document.getElementById('search-input'));
  var autocomplete = new google.maps.places.Autocomplete(input);
  autocomplete.bindTo('bounds', map);
  var infowindow = new google.maps.InfoWindow();
  var marker = new google.maps.Marker({
    map: map,
    position: {
      lat: lat_def,
      lng: lng_def
    },
    visible: true,
    draggable: true,
    anchorPoint: new google.maps.Point(0, -29)
  });

  autocomplete.addListener('place_changed', function() {
    infowindow.close();
    marker.setVisible(false);
    var place = autocomplete.getPlace();
    $('#lat').val(place.geometry.location.lat());
    $('#lng').val(place.geometry.location.lng());
    if (place.geometry.viewport) {
      map.fitBounds(place.geometry.viewport);
    } else {
      map.setCenter(place.geometry.location);
      map.setZoom(17);
    }

    marker.setIcon(({
      url: place.icon,
      size: new google.maps.Size(71, 71),
      origin: new google.maps.Point(0, 0),
      anchor: new google.maps.Point(17, 34),
      scaledSize: new google.maps.Size(35, 35)
    }));
    marker.setPosition(place.geometry.location);
    marker.setVisible(true);

    var address = '';
    if (place.address_components) {
      address = [
        (place.address_components[0] && place.address_components[0].short_name || ''),
        (place.address_components[1] && place.address_components[1].short_name || ''),
        (place.address_components[2] && place.address_components[2].short_name || '')
      ].join(' ');
    }
    infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
    infowindow.open(map, marker);
  });

  google.maps.event.addListener(marker, 'drag', function(event) {
    $('#lat').val(event.latLng.lat());
    $('#lng').val(event.latLng.lng());
  });

  function setupClickListener(id, types) {
    var radioButton = document.getElementById(id);
    radioButton.addEventListener('click', function() {
      autocomplete.setTypes(types);
    });
  }
}
map();
