function dibuixar() {
  // This function is to execute the canvas when the webpage is loaded.
  let canvas = document.getElementById("areaDibuix");
  let ctx = canvas.getContext("2d"); // ctx (context) is an object.
  let tamany = 75;
  let [x, y] = [100, 100]; // Declare x, y with 100 as value.

  ctx.lineWidth = 5;

  // for (let i = 0; i < 8; i++, increment += 75) {
  //     if (i % 6.5 == 0.5) {
  //         ctx.strokeStyle = "red";
  //     } else if (i % 6 == 0.5) {
  //         ctx.strokeStyle = "white";
  //     }

  //     ctx.strokeRect(100, 100, increment, 75);
  //     ctx.strokeRect(100, 175, increment, 75);
  //     ctx.strokeRect(100, 250, increment, 75);
  //     ctx.strokeRect(100, 325, increment, 75);
  //     ctx.strokeRect(100, 400, increment, 75);
  //     ctx.strokeRect(100, 475, increment, 75);
  //     ctx.strokeRect(100, 550, increment, 75);
  //     ctx.strokeRect(100, 625, increment, 75);
  // }

  //   for (let i = 0; i < 8; i++, increment += tamany) {  // Rows.
  //       for (let j = 0; j < 8; j++, increment += tamany) {  // Columns.
  //           ctx.strokeRect(x, y, increment, tamany);
  //       }

  //       ctx.strokeRect(x, y, increment, tamany);
  //   }

  for (let i = 1; i < 9; i++) {
    // Rows.
    x = 100;

    for (let j = 1; j < 9; j++) {
      // Columns.
      if ((i + j) % 2 == 0) {
        ctx.fillStyle = "black";
        console.log("i+j / 2 = " + (i + j) / 2);
        console.log("Black");
      } else {
        ctx.fillStyle = "lightgrey";
        console.log("i+j / 2 = " + (i + j) / 2);
        console.log("Lightgrey");
      }

      //   ctx.strokeRect(x, y, tamany, tamany)
      ctx.fillRect(x, y, tamany, tamany);

      x += tamany;
    }

    y += tamany;
  }
}

window.addEventListener("load", dibuixar, true);
