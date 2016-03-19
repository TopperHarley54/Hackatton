'use strict';
$(function () {
  if (typeof mymap !== 'undefined') {
    window.controlCarte = {};

    mymap.on('click', onMapClick);
    // var coo;

  }

});

var coo;

function onMapClick(e) {

// var affipopup=' <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">    Launch demo modal  </button>   <!-- Modal --> <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">  <div class="modal-dialog" role="document">    <div class="modal-content">      <div class="modal-header">        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>        <h4 class="modal-title" id="myModalLabel">Modal title</h4>      </div>      <div class="modal-body">        test      </div>      <div class="modal-footer">        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>        <button type="button" class="btn btn-primary">Save changes</button>      </div>    </div>  </div></div>';


    // var popup = L.popup({maxWidth:50,maxHeight:50}).setLatLng(e.latlng).setContent("<div onclick=window.location.href='alertForm'> create new alert </div>").openOn(mymap);
    var popup = L.popup({maxWidth:170,maxHeight:50}).setLatLng(e.latlng).setContent("<div onclick=afficherPopUpEnregistrement()> Créer une nouvel alerte. </div>").openOn(mymap);
    // var popup = L.popup({maxWidth:50,maxHeight:50}).setLatLng(e.latlng).setContent(affipopup).openOn(mymap);
    coo=e.latlng;

}

function afficherPopUpEnregistrement(latlng){
  //type de l'information dans un selecteur
  //commentaire libre
  var popupModif = $('<div>').attr('class','popup modal fade in');
  var affCoordonnees = $('<div>').attr('class','coordonnees');
  affCoordonnees.text(coo.toString());
  var affSelecteur = $('<select>').attr('class','selecteur');
  affSelecteur.append($('<option>').append('Ecole'));
  affSelecteur.append($('<option>').append('Médical'));
  affSelecteur.append($('<option>').append('Sport/Loisir'));
  affSelecteur.append($('<option>').append('Commerce Alimentaire'));
  affSelecteur.append($('<option>').append('Marché'));
  affSelecteur.append($('<option>').append('Pour la maison'));
  affSelecteur.append($('<option>').append('Shopping'));
  affSelecteur.append($('<option>').append('Station-service'));
  var affCommentaire = $('<div>').attr('class','champCommentaire').text("Commentaire").append($("<input>").attr('type','text').addClass('commentaire'));
  var boutonValidation = $('<button>').attr('id','boutonValider').text('Sauver').attr('onclick','sauverDonnees()');


  popupModif.append(affCoordonnees);
  popupModif.append(affSelecteur);
  popupModif.append(affCommentaire);
  popupModif.append(boutonValidation);
  $("div.modal-body").append(popupModif);
  $("div.modal").modal();
  $("div.modal-backdrop").detach();
}

function sauverDonnees() {
  var type = $('.selecteur').val();
  var comm = $('.commentaire').val();
  var alerte = [{"lat":coo["lat"],"lng":coo["lng"],"type":type,"commentaire":comm}];
  $.ajax({
    type: "POST",
    url:"api/alerte",
    data : JSON.stringify(alerte) ,
    success: function(data){
      console.log(data);
      $('div.modal').modal('hide')
    },
    error: function(){
      console.log("fail...");
    }
  });
}
