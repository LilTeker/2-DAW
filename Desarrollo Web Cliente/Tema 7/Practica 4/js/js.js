//return new Date();
//async function getDate() {
//}
//
//async function printDate() {
//    let date = await getDate();
//    document.getElementById("data").innerHTML = date.toUTCString();
//}
//
//setInterval(() => {
//   printDate(); 
//}, 1000);
let date = new Date();



async function getDate() {
    return new Date();
}

async function printDate() {
    let date = await getDate();
    document.getElementById("data").innerHTML = date.toUTCString();
}

setInterval(() => {
   printDate(); 
}, 1000);

document.addEventListener("click", () => {
    let promise = new Promise((resolve, reject) => {
        let date = new Date();
        let tInicial = date.getTime();

    });
});

//https://stackoverflow.com/questions/2330638/calculating-the-time-between-two-clicks-in-javascript