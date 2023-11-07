var imatge = new Image();
imatge.src = "images/castell.jpeg";
imatge.onload = function () {
  dibuixar();
};
try {
  document.createElement("canvas").getContext("2d");
  //window.addEventListener("load", dibuixar, true);
} catch (e) {
  alert("HTML5 Canvas no suportat.");
}

function dibuixar() {
  var canvas = document.getElementById("exercici");

  if (canvas.getContext) {
    var ctx = canvas.getContext("2d");
    // ctx.drawImage(imatge, 0, 0, 300, 350); // 300, 350 is the width and height of the original image.
    generarNeu(imatge, ctx, canvas);
  }
}

// -- GENERATE SNOW --/

function generarNeu(imageObj, context, canvas) {
  var destX = 0;
  var destY = 0;

  context.drawImage(imageObj, destX, destY, 300, 350); // Here I draw the original image.

  var imageData = context.getImageData(
    destX,
    destY,
    canvas.width,
    canvas.height
  );
  var pixels = imageData.data;

  for (var i = 0; i < pixels.length; i += 4) {
    suma = pixels[i] + pixels[i + 1] + pixels[i + 2];

    if (suma > 128) {
      color = 255;
    } else color = 0;

    pixels[i] = pixels[i];
    pixels[i + 1] = pixels[i + 1];
    pixels[i + 2] = pixels[i];

    for (let x = 0; x < 1; x++) {
      let coordAleatoriaX = Math.random() * 300;
      let coordAleatoriaY = Math.random() * 350;
      let blancAleatori = Math.random() * 128 + 127;

      console.log(parseInt(canvas.width * coordAleatoriaY) + coordAleatoriaX) *
        4;

      pixels[parseInt((canvas.width * coordAleatoriaY + coordAleatoriaX) * 4)] =
        blancAleatori;
      pixels[
        parseInt((canvas.width * coordAleatoriaY + coordAleatoriaX) * 4 + 1)
      ] = blancAleatori;
      pixels[
        parseInt((canvas.width * coordAleatoriaY + coordAleatoriaX) * 4 + 2)
      ] = blancAleatori;
    }
  }

  // Here I draw the image I modified.
  context.putImageData(imageData, 0, 400);
}
