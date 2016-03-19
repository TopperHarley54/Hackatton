'use strict';
$(function () {

    function waitGet(data) {
        return data;
    }

    function getVelib() {
        $.ajax({
          type: "GET",
          url:"api/velib"
          success: function (data) {
            return data;
          },
          error: function () {
            return null;
          }
        });
    }
    console.log(getVelib());
});