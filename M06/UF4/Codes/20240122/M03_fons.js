/*
 * comunicacions amb backend amb Node i WebSockets
 * L'exercici es podria millorar significativament utilitzant 6bytes HEX per
 * a enviar de cop la codificació del color
 * @author  sergi.grau@fje.edu
 * @version 2.0 19.02.2016
 * format del document UTF-8
 *
 * CHANGELOG
 * 19.02.2016
 * - comunicacions amb backend amb Node i WebSockets
 *
 * NOTES
 * ORIGEN
 * Desenvolupament Aplicacions Web. Jesuïtes el Clot
 */
const socket = io();

// If I get recieve data from the server.
socket.on("rgb", function (data) {
  console.log("CLIENT -> dades rebudes del servidor->" + data.r);
  console.log("CLIENT -> dades rebudes del servidor->" + data.g);
  console.log("CLIENT -> dades rebudes del servidor->" + data.b);
  document.getElementById("r").value = data.r;
  document.getElementById("g").value = data.g;
  document.getElementById("b").value = data.b;
  document.body.style.backgroundColor =
    "rgb(" + data.r + "," + data.g + "," + data.b + ")";
});

/**
 * registra tots els esdeveniments després d'haver carregat la pàgina
 */
function registre() {
  // When you change the color.
  document.getElementById("r").addEventListener(
    "change",
    function () {
      console.log(document.getElementById("r").value);
      console.log(document.getElementById("g").value);
      console.log(document.getElementById("b").value);

      // I send the value of the color red.
      socket.emit("r", {
        r: document.getElementById("r").value,
        g: document.getElementById("g").value,
        b: document.getElementById("b").value,
      });
    },
    false
  );
  document.getElementById("g").addEventListener(
    "change",
    function () {
      console.log(document.getElementById("r").value);
      console.log(document.getElementById("g").value);
      console.log(document.getElementById("b").value);
      socket.emit("g", {
        r: document.getElementById("r").value,
        g: document.getElementById("g").value,
        b: document.getElementById("b").value,
      });
    },
    false
  );
  document.getElementById("b").addEventListener(
    "change",
    function () {
      console.log(document.getElementById("r").value);
      console.log(document.getElementById("g").value);
      console.log(document.getElementById("b").value);
      socket.emit("b", {
        r: document.getElementById("r").value,
        g: document.getElementById("g").value,
        b: document.getElementById("b").value,
      });
    },
    false
  );
}

window.addEventListener("load", registre, false);
