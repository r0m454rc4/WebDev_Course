function dibuixar() {
  // This function is to execute the canvas when the webpage is loaded.
  let canvas = document.getElementById("areaDibuix");
  let ctx = canvas.getContext("2d"); // ctx (context) is an object.
  ctx.lineWidth = 4;
  ctx.strokeStyle = "#F00"; // The same as FF0000.

  // TRIANGLE.
  ctx.beginPath();
  // The coordenates are in x, y.
  ctx.moveTo(50, 50); // Draw from one point.
  ctx.lineTo(100, 100);
  ctx.lineTo(200, 50);
  ctx.closePath(); // Close the canvas.
  ctx.stroke(); // This is to draw the canvas.

  // RECTANGLE TEST.
  ctx.beginPath();
  ctx.fillRect(200, 125, 50, 80); // 50 = width, 80 = height.
  ctx.closePath();
  // ctx.clearRect(0, 0, 50, 80); // To delete it.
  ctx.beginPath();
  ctx.strokeRect(75, 250, 50, 50);
  ctx.closePath();

  // CIRCUMFERENCE.
  ctx.beginPath();
  let graus = 360;
  var radians = (Math.PI / 180) * graus;
  ctx.arc(100, 175, 50, 0, radians, true);
  ctx.closePath(); // Close the canvas.
  ctx.fillStyle = "orange";
  ctx.strokeStyle = "blue";
  ctx.fill();
  ctx.stroke();

  // // TEST
//   ctx.beginPath();
//   ctx.moveTo(75, 25);
//   ctx.quadraticCurveTo(25, 25, 25, 62.5);
//   ctx.quadraticCurveTo(25, 100, 50, 100);
//   ctx.quadraticCurveTo(50, 120, 30, 125);
//   ctx.quadraticCurveTo(60, 120, 65, 100);
//   ctx.quadraticCurveTo(125, 100, 125, 62.5);
//   ctx.quadraticCurveTo(125, 25, 75, 25);
//   ctx.stroke();
}

window.addEventListener("load", dibuixar, true);
