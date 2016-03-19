'use strict';
$(function () {
  window.controlNavbar = {};

  window.param = {};

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

        if($(this).children('input').prop('checked') === true){
          var tmp = $(li).parent().prev().text();
          if (window.param[tmp] === undefined) {
            window.param[tmp] = [];
          }
          window.param[tmp].push($(li.children[1]).attr('name'));
        }else{
          window.param[$(li).parent().prev().text()].splice($(li).parent().prev().text().indexOf($(li.children[1]).attr('name')),1);
        }
        console.log(JSON.stringify(window.param));
        $.ajax({
          type: "POST",
          url:"api/requeteMap",
          data : JSON.stringify(window.param) ,
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
