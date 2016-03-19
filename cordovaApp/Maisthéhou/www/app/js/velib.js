

var markerArray = new Array();


function velib() {

        if(markerArray.length >= 1) {
          for(var i = 0; i < markerArray.length; i++){
            mymap.removeLayer(markerArray[i]);
          }
          markerArray = new Array();
        }
        else {
          $.ajax({
            type: "GET",
            url:"api/velib",
            contentType: "application/json" ,
            success: function(data){
              $($.parseJSON(data)).each(function (index, iteration) {
                  var marker = L.marker([iteration.position.lat, iteration.position.lng]);
                  mymap.addLayer(marker);
                  marker.bindPopup('<b>'+iteration.name+'</b><br>'+iteration.address);
                  markerArray.push(marker);
              });
            },
            error: function(){
              console.log("fail...");
            }
          });

      }
    
}
