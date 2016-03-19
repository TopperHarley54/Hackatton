
var markerArray = new Array();


function alerte() {


        if(markerArray.length >= 1){
          for(var i = 0; i < markerArray.length; i++){
               mymap.removeLayer(markerArray[i]);
          }
          markerArray = new Array();
        }
        else {

          $.ajax({
            type: "GET",
            url:"api/alerte",
            contentType: "application/json" ,
            success: function(data){
              console.log(data);
              $($.parseJSON(data)).each(function (index, iteration) {

                  var marker = L.marker([iteration.lat, iteration.lng]);
                  mymap.addLayer(marker);
                  marker.bindPopup('<b>'+iteration.type+'</b><br>'+iteration.commentaire);
                  markerArray.push(marker);
              });
            },
            error: function(){
              console.log("fail...");
            }
          });

      }
    }



