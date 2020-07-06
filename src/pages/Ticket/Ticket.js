var can=document.getElementById("canva1");
var ctx=can.getContext("2d");
ctx.fillStyle= "#FF99FF";
ctx.fillRect(0, 0, 900, 460);
var img = new Image();
img.addEventListener('load',function(e){ ctx.drawImage(this,0,0,300,130);}, true);
img.src = "../../../res/images/beauty.png"
ctx.beginPath()
ctx.fillStyle = "#330000"
ctx.arc(250, 90, 40, 0, Math.PI*2, true);
ctx.fill();
ctx.font = "25px Arial";
ctx.fillStyle= "#000000";
ctx.fillText("Ticket Registration Agency", 0, 160);
ctx.font = "bold 20px Arial"
ctx.fillText("REGION:", 10, 210);
ctx.fillText("TOWN:", 10, 250);
ctx.fillText("DATE:", 10, 290);
ctx.fillText("TIME:", 150, 290);
ctx.fillText("Number:", 10, 330);
ctx.fillText("TICKET FEE:", 10, 370);
ctx.font = "bold 40px Arial";
ctx.strokeText("PAID", 150, 390);
ctx.font = "bold 35px Arial"
ctx.fillText("Nice Journey", 10, 450);

