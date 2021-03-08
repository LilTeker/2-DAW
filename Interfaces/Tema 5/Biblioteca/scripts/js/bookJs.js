async function submitComment(e) {
    e.preventDefault();
}


function addListeners() {

    $("#submitComment").click(function (e) {submitComment(e)});
  
  }
  
  
  
  
  $(document).ready(function () {
  
    addListeners();
  
  });
  