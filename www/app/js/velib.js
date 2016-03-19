$(document).ready(function () {
    function velib() {
        $.ajax({
          type: "GET",
          url:"api/velib",
          contentType: "application/json" ,
          success: function(data){
            $($.parseJSON(data)).each(function (index, iteration) {
                L.marker([iteration.position.lat, iteration.position.lng]).addTo(mymap)
                .bindPopup('<b>'+iteration.name+'</b><br>'+iteration.address);
            });
          },
          error: function(){
            console.log("fail...");
          }
        });
    }
});