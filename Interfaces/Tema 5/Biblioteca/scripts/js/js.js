function showData() {

  $.getJSON("http://localhost/Biblioteca/scripts/php/showBooks.php", function(data) {
    console.log(data);
  });

}

function checkLogIn(e) {

  e.preventDefault();


  let form_data = JSON.stringify($("#loginForm").serializeToJSON());
  console.log(form_data);

/*
  $(document).on('submit', '#create-product-form', function(){
        
    // get form data
    var form_data=JSON.stringify($(this).serializeObject());

    // submit form data to api
    $.ajax({
        url: "http://localhost/api/product/create.php",
        type : "POST",
        contentType : 'application/json',
        data : form_data,
        success : function(result) {
            // product was created, go back to products list
            showProducts();
        },
        error: function(xhr, resp, text) {
            // show error to console
            console.log(xhr, resp, text);
        }
    });
    
    
    return false;
    
});
*/

}
function checkRegister(e) {
  e.preventDefault();


  let form_data = JSON.stringify($("#registerForm").serializeToJSON());
  console.log(form_data);

}



function addListeners() {

  $("#showData").on("click", function () {showData()});
  $("#login").click(function (e) {checkLogIn(e)});
  $("#register").click(function (e) {checkRegister(e)});

}




$(document).ready(function () {

  addListeners();

});