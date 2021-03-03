
function showData() {

  $.ajax({
    type: "post",
    url: "scripts/showBooks.php",
    data: {nombre: "TEKER", mail: "miguel00rg@hotmail.com"},
    success: function (response) {

      $("#jsData").text(JSON.parse(response));

    }
  });

}





function addListeners() {

  $("#showData").on("click", function () {showData()});

}




$(document).ready(function () {

  addListeners();

});