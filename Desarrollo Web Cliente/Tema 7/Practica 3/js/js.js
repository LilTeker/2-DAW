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

