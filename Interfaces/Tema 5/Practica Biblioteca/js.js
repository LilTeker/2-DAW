let ej = "prueb";

function showData() {

  $.ajax({
    type: "post",
    url: "consultas.php",
    data: {ejemplo: ej, salary: 7050},
    success: function (response) {

      

      $("#jsData").text(response);
    }
  });

}





function addListenersFormFirstHalf() {

  $("#showData").on("click", function () {showData()});

}




$(document).ready(function () {

  addListenersFormFirstHalf();

});