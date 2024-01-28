var imatge = new Image();
imatge.src = "images/logo.png";
imatge.onload = function () {
  dibuixar();
};
try {
  document.createElement("canvas").getContext("2d");
  // window.addEventListener("load", dibuixar, true);
} catch (e) {
  alert("HTML5 Canvas no suportat.");
}
function dibuixar() {
  var canvas = document.getElementById("exercici");

  if (canvas.getContext) {
    var ctx = canvas.getContext("2d");
    ctx.drawImage(imatge, 0, 0);
    ferNegatiu(imatge, ctx, canvas);
    // escalaGrisos(imatge, ctx, canvas);
    // escalaNegres(imatge, ctx, canvas);
    // escalaVermells(imatge, ctx, canvas);
  }
}

// -- SWAP COLORS. -- //
function ferNegatiu(imageObj, context, canvas) {
  var destX = 0;
  var destY = 150;

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

// -- GREYSCALE. -- //
function escalaGrisos(imageObj, context, canvas) {
  var destX = 0;
  var destY = 150;

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

// -- BLACK AND WHITE. -- //
function escalaNegres(imageObj, context, canvas) {
  var destX = 0;
  var destY = 150;

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

    pixels[i] = color;
    pixels[i + 1] = color;
    pixels[i + 2] = color;
  }
  // modifiquem original
  context.putImageData(imageData, 0, 100);
}

// -- RED SCALE. -- //
function escalaVermells(imageObj, context, canvas) {
  var destX = 0;
  var destY = 150;

  context.drawImage(imageObj, destX, destY);
  var imageData = context.getImageData(0, 100, canvas.width, canvas.height);
  var pixels = imageData.data;

  for (var i = 0; i < pixels.length; i += 4) {
    suma = pixels[i] + pixels[i + 1] + pixels[i + 2];

    if (suma / 1 > 127) {
      color = 255;
    } else {
      color = 0;
    }

    pixels[i] = color;
    pixels[i + 1] = suma / 3;
    pixels[i + 2] = suma / 3;
  }
  // modifiquem original
  context.putImageData(imageData, 0, 100);
}
