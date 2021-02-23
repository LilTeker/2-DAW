function checkNameInput() {

  let input = $("#name").val();

  if (input.match(/^[A-Za-z\s]+$/)) {
    console.log("valid");
  } else {
    console.log("invalid");
  }

/*
  let regex = new RegExp("/^[A-Za-z\s]+$/");

  if (regex.test(input)) {
    console.log("valid");
  } else {
    console.log("invalid");
  }

   */
}




function addListenersFormFirstHalf() {

  $("#name").on("input", function () {checkNameInput()});

  /*

  name
  lastName
  dni
  sex??????????
  date???????
  address

  */


}




$(document).ready(function () {

  addListenersFormFirstHalf();

});















//Intento de hacerlo con libreria validator de jquery
/*
//Añade  el metodo de validación para meter regex en el form.validate()
$.validator.addMethod(
  "regex",
  function(value, element, regexp) {
    var re = new RegExp(regexp);
    return this.optional(element) || re.test(value);
  },
  "Please check your input."
);


//Añadir el datepicker al input de date


$(document).ready(function() {
    $("#validate").validate({
      rules: {
        name : {
          required: true,
          regex: "^[a-zA-Z]+$"
        },
        lastName : {
          required: true,
          regex: "^[a-zA-Z]+$"
        },
        dni : {
          required: true,
          regex : "^\d{8}[a-zA-Z]{1}$"
        }
      },
      messages : {
        name : {
          required : "Este campo es necesario",
          regex : "Solo se admiten letras en este campo"
        },
        lastName : {
          required : "Este campo es necesario",
          regex : "Solo se admiten letras en este campo"
        },
        dni : {
          required : "Este campo es necesario",
          regex : "Escriba un DNI válido ej: '12345678Z'"
        }
      }
    });
  });







$(document).ready(function() {
  $("#basic-form").validate({
    errorClass: "error fail-alert",
    validClass: "valid success-alert",
    rules: {
      name : {
        required: true,
        minlength: 3
      },
      age: {
        required: true,
        number: true,
        min: 18
      },
      email: {
        required: true,
        email: true
      },
      weight: {
        required: {
          depends: function(elem) {
            return $("#age").val() > 50
          }
        },
        number: true,
        min: 0
      }
    },
    messages : {
      name: {
        minlength: "Name should be at least 3 characters"
      },
      age: {
        required: "Please enter your age",
        number: "Please enter your age as a numerical value",
        min: "You must be at least 18 years old"
      },
      email: {
        email: "The email should be in the format: abc@domain.tld"
      },
      weight: {
        required: "People with age over 50 have to enter their weight",
        number: "Please enter your weight as a numerical value"
      }
    }
  });
});
*/