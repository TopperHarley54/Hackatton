$(document).ready(function () {
    function alerte() {
        $.ajax({
          type: "GET",
          url:"api/alerte",
          contentType: "application/json" ,
          success: function(data){
            $($.parseJSON(data)).each(function (index, iteration) {
                L.marker([iteration.lat, iteration.lng]).addTo(mymap)
                .bindPopup('<b>'+iteration.type+'</b><br>'+iteration.commentaire);
            });
          },
          error: function(){
            console.log("fail...");
          }
        });
    }
    alerte();
});