function writeTime() {
    let date = new Date();
    let hours = date.getHours();
    let min = date.getMinutes();
    let sec = date.getSeconds();
    let milisec = date.getMilliseconds();

    let html = "<p>" + hours + ":" + min + ":" + sec + "," + milisec + "</p>";

    document.getElementById("divJS").innerHTML = html;
    setInterval(writeTime, 1);
}  


document.addEventListener("DOMContentLoaded", () => {
    writeTime();
});