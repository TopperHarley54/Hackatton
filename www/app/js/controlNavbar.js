'use strict';
$(function () {
  window.controlNavbar = {};

  var navbar = document.getElementById('navbar');
  // console.log(navbar);
  $(navbar.children).each(function(index, element){
    // console.log($(element.children)[0]);
    $($(element.children)[1].children).each(function(index, li){
      // console.log(li);
      //  console.log(li.children[0]);
      $(li.children[0]).click((event) => {
        var nomData = $(li.children[1]).attr('name');
        console.log(nomData);

        $.ajax({
          type: "GET",
          url:"getData.php",
          data: {
            action : 'actualiserMap',
            typeData : nomData
          },
          success: function(data){
            console.log(data);
          },
          error: function(){
            console.log("fail...");
          }
        })
      });
    })
  });

  $(document).ready(function(){

    $(".option").children('ul').hide();
    var cache;
    $(".option").children('.titre').click(function(){
        if(cache === undefined || cache == false){
          $(this).parent().children('ul').hide();
          cache = true;
        }else{
          $(this).parent().children('ul').show();
          cache = false;
        }
    });
});


});
