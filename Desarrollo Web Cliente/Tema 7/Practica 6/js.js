let form = document.getElementById("formLocalidad");

form.addEventListener("submit", function (e) {
    e.preventDefault();

   let datos = new FormData(form);
   console.log(datos.get("localidad"));

   fetch("php.php", {
       method: 'POST',
       body: datos
   })
       .then(res => res.json())
       .then(data =>  {
           document.getElementById("result").innerHTML = data;
       })
       .catch(err => document.getElementById("result").innerHTML = "<p style='color: red'>La ciudad NO existe en nuestra lista</p>");

});