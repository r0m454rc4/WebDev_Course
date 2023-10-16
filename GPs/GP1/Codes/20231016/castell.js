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
    ctx.drawImage(imatge, 0, 0);
    // ferNegatiu(imatge, ctx, canvas);
    generarNeu(imatge, ctx, canvas);
  }
}

// -- SWAP COLORS. -- //

function ferNegatiu(imageObj, context, canvas) {
  var destX = 0;
  var destY = 100;

  context.drawImage(imageObj, destX, destY);
  var imageData = context.getImageData(0, 100, canvas.width, canvas.height);
  var pixels = imageData.data;
  for (var i = 0; i < pixels.length; i += 4) {
    pixels[i] = 255 - pixels[i]; // red
    pixels[i + 1] = 255 - pixels[i + 1]; // green
    pixels[i + 2] = 255 - pixels[i + 2]; // blue
    // i+3 es alpha
  }
  // modifiquem original
  context.putImageData(imageData, 0, 100);
}

// -- GREYSCALE -- //

function escalaGrisos(imageObj, context, canvas) {
  var destX = 0;
  var destY = 100;

  context.drawImage(imageObj, destX, destY);
  var imageData = context.getImageData(0, 100, canvas.width, canvas.height);
  var pixels = imageData.data;

  for (var i = 0; i < pixels.length; i += 4) {
    suma = pixels[i] + pixels[i + 1] + pixels[i + 2];

    pixels[i] = suma / 3; // We make the average to paint it grey.
    pixels[i + 1] = suma / 3;
    pixels[i + 2] = suma / 3;

    // pixels[i+2] = 255 - pixels[i+2];  // blue.
    // i+3 = alpha.
  }
  // modifiquem original
  context.putImageData(imageData, 0, 100);
}

// -- BLACK AND WHITE -- //

function escalaNegres(imageObj, context, canvas) {
  var destX = 0;
  var destY = 100;

  context.drawImage(imageObj, destX, destY);
  var imageData = context.getImageData(0, 100, canvas.width, canvas.height);
  var pixels = imageData.data;

  for (var i = 0; i < pixels.length; i += 4) {
    suma = pixels[i] + pixels[i + 1] + pixels[i + 2];

    if (suma / 3 > 127) {
      color = 255;
    } else {
      color = 0;
    }

    pixels[i] = color; // We make the average to paint it grey.
    pixels[i + 1] = color;
    pixels[i + 2] = color;
  }
  // modifiquem original
  context.putImageData(imageData, 0, 100);
}

// -- GENERATE SNOW --/

function generarNeu(imageObj, context, canvas) {
  var destX = 0;
  var destY = 100;

  context.drawImage(imageObj, destX, destY, 300, 300);
  var imageData = context.getImageData(0, 100, canvas.width, canvas.height);
  var pixels = imageData.data;

  for (var i = 0; i < pixels.length; i += 4) {
    suma = pixels[i] + pixels[i + 1] + pixels[i + 2];

    if (suma / 3 > 127) {
      color = 255;
    } else {
      color = 0;
    }

    pixels[i] = color; // We make the average to paint it grey.
    pixels[i + 1] = color;
    pixels[i + 2] = color;

    for (let x = 0; x < 1000; i++) {
      let coordAleatoriaX = Math.random() * 300;
      let coordAleatoriaY = Math.random() * 300;
      let blancAleatori = Math.random() * 128 + 127;

      console.log(parseInt(canvas.width * coordAleatoriaY) + coordAleatoriaX) *
        4;

      // pixels[((canvas.width * coordAleatoriaY) + coordAleatoriaX) * 4] = 0;
      // pixels[(canvas.width * coordAleatoriaY + coordAleatoriaX) * 4 + 1] = 0;
      // pixels[(canvas.width * coordAleatoriaY + coordAleatoriaX) * 4 + 2] = 0;
    }
  }
  // modifiquem original
  context.putImageData(imageData, 0, 300);
}
