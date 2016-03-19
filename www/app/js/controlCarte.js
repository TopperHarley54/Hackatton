'use strict';
$(function () {
  window.controlCarte = {};

  mymap.on('click', onMapClick);
  // var coo;



});

var coo;

function onMapClick(e) {

// var affipopup=' <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">    Launch demo modal  </button>   <!-- Modal --> <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">  <div class="modal-dialog" role="document">    <div class="modal-content">      <div class="modal-header">        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>        <h4 class="modal-title" id="myModalLabel">Modal title</h4>      </div>      <div class="modal-body">        test      </div>      <div class="modal-footer">        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>        <button type="button" class="btn btn-primary">Save changes</button>      </div>    </div>  </div></div>';


    // var popup = L.popup({maxWidth:50,maxHeight:50}).setLatLng(e.latlng).setContent("<div onclick=window.location.href='alertForm'> create new alert </div>").openOn(mymap);
    var popup = L.popup({maxWidth:50,maxHeight:50}).setLatLng(e.latlng).setContent("<div onclick=afficherPopUpEnregistrement()> create new alert </div>").openOn(mymap);
    // var popup = L.popup({maxWidth:50,maxHeight:50}).setLatLng(e.latlng).setContent(affipopup).openOn(mymap);
    coo=e.latlng;

}

function afficherPopUpEnregistrement(latlng){
  // console.log('TEST');
  // console.log(coo);
  //coordonnées
  //type de l'information dans un selecteur
  //commentaire libre
  var popupModif = $('<div>').attr('class','popup modal fade in');
  var affCoordonnees = $('<div>').attr('class','coordonnees').val(latlng);
  var affSelecteur = $('<div>').attr('class','selecteur');
  var affCommentaire = $('<div>').attr('class','champCommentaire').append($("<input>").attr('type','text'));
  var boutonValidation = $('<button>').attr('class','boutonValider');

popupModif.append(affCoordonnees);
popupModif.append(affSelecteur);
popupModif.append(affCommentaire);
$("div.modal-body").append(popupModif);
$("div.modal").modal();
$("div.modal-backdrop").detach();
  // console.log(popupModif);
}
