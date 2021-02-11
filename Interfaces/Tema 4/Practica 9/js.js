function printUsers() {
    let users; 
    fetch('https://jsonplaceholder.typicode.com/users')
    .then((response) => response.json())
    .then((json) => console.log(json))
    .catch((e) => console.log(e));

    console.log(users);

}


$(document).ready(function () {
    $("#loadUsers").click(function (e) { 
        e.preventDefault();
        printUsers();
    });
});