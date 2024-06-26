function dibuixar() {
  // This function is to execute the canvas when the webpage is loaded.
  let canvas = document.getElementById("areaDibuix");
  let ctx = canvas.getContext("2d"); // ctx (context) is an object.
  let [x, y] = [100, 100]; // Declare x, y with 100 as value.

  let queen = new Image(); // Now queen is an image.
  let pawn = new Image();

  queen.onload = () => {
    // When queen charges:
    ctx.drawImage(queen, 100, 100, 75, 75); // I draw it.
  };
  queen.src = "queen.png";

  pawn.onload = () => {
    ctx.drawImage(pawn, 175, 100, 75, 75); // I draw it.
  };
  pawn.src = "pawn.png";

  ctx.lineWidth = 4;

  for (let i = 1; i < 9; i++) {
    // Rows.
    x = 100;
    let degradat;

    for (let j = 1; j < 9; j++) {
      // Columns.
      if ((i + j) % 2 == 0) {
        degradat = ctx.createLinearGradient(x, y, x + 75, y);
        degradat.addColorStop(0, "black");
        degradat.addColorStop(0.1, "#333");
        degradat.addColorStop(0.45, "#666");
        degradat.addColorStop(0.9, "#999");
        degradat.addColorStop(1, "#CCC");
        // console.log(`x: ${x}, y: ${y}`);
      } else {
        degradat = ctx.createLinearGradient(x, y, x + 75, y);
        degradat.addColorStop(0, "white");
        degradat.addColorStop(0.1, "#EEE");
        degradat.addColorStop(0.45, "#DDD");
        degradat.addColorStop(0.9, "#BBB");
        degradat.addColorStop(1, "#999");
      }

      ctx.fillStyle = degradat;
      ctx.strokeRect(x, y, 75, 75);
      ctx.fillRect(x, y, 75, 75);

      x += 75; //In order to increase the row size.
    }

    y += 75; // In order to increase the row column.
  }
}

window.addEventListener("load", dibuixar, true);
