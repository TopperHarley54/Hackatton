'use strict';
$(function () {
  window.controlCarte = {};

  mymap.on('click', onMapClick);




});



function onMapClick(e) {

    var popup = L.popup({maxWidth:50,maxHeight:50}).setLatLng(e.latlng).setContent("<div onclick=window.location.href='alertForm'> create new alert </div>").openOn(mymap);

 
}