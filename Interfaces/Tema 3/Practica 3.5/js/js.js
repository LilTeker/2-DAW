var c = document.getElementById("canvas");

var ctx = c.getContext("2d");
ctx.moveTo(100, 100);



var firstRect = 80;
var secondRect = 140;
var segundos = 0;
setInterval(drawClock, 1000);


function drawClock() {

    ctx.clearRect(0, 0, 500, 400);

    ctx.font = "30px Arial";
    ctx.fillText(segundos++, 10, 50);

    ctx.rect(100, 50, 100, 140);
    ctx.fillRect(100, 50, 100, firstRect++);
    ctx.stroke();
    
    ctx.rect(140, 190, 25, 25);
    ctx.fillRect(140, 190, 25, 25);
    ctx.stroke();

    ctx.rect(100, 215, 100, 140);
    ctx.fillRect(100, 215, 100, secondRect--);
    ctx.stroke();

    if (segundos == 61) {
        firstRect = 80;
        secondRect = 140;
        segundos = 0;
    }
}