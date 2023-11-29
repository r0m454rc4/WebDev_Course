let xhr;

function inici() {
  // If I click on the button called "Crear partida".
  document.getElementById("crearPartida").addEventListener("click", iniciarJoc);

  document
    .getElementById("obtenirCarta")
    .addEventListener("click", obtenirCarta);

  document
    .getElementById("mostrarCartes")
    .addEventListener("click", mostrarCartes);

  document.getElementById("tirarCarta").addEventListener("click", tirarCarta);

  document.getElementById("apostar").addEventListener("click", apostar);

  document.getElementById("passar").addEventListener("click", passar);

  document.getElementById("acabarJoc").addEventListener("click", acabarJoc);

  xhr = new XMLHttpRequest();
}

function iniciarJoc() {
  // Here I declare codiPartida that stores the value from the input.
  let codiPartida = document.getElementById("codiPartida").value;

  // The variable data must have this format: codiPartida= is the KEY, and ${codiPartida} is the VALUE.
  let data = `codiPartida=${codiPartida}`;
  // data = parseInt(data);

  xhr.addEventListener("readystatechange", function () {
    if (this.readyState === 4) {
      console.log(this.responseText);
    }
  });

  xhr.open("POST", "http://localhost:8888/iniciarJoc");
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.send(data);
}

function obtenirCarta() {
  // Here I have some variables that sore the content from the input
  let codiPartida = document.getElementById("codiPartida").value;
  let numJug = document.getElementById("numJug").value;

  // The variable data must have this format: codiPartida= is the KEY, and ${codiPartida} is the VALUE.
  let data = `codiPartida=${codiPartida}&numJug=${numJug}`;
  // data = parseInt(data);

  xhr.addEventListener("readystatechange", function () {
    if (this.readyState === 4) {
      // console.log(this.responseText);
    }
  });

  xhr.open(
    "GET",
    `http://localhost:8888/obtenirCarta/${codiPartida}/${numJug}`
  );
  xhr.send(data);
}

function mostrarCartes() {
  // Here I have some variables that sore the content from the input
  let codiPartida = document.getElementById("codiPartida").value;
  let numJug = document.getElementById("numJug").value;

  // The variable data must have this format: codiPartida= is the KEY, and ${codiPartida} is the VALUE.
  let data = `codiPartida=${codiPartida}&numJug=${numJug}`;
  // data = parseInt(data);

  xhr.addEventListener("readystatechange", function () {
    if (this.readyState === 4) {
      // console.log(this.responseText);
    }
  });

  xhr.open(
    "GET",
    `http://localhost:8888/mostrarCartes/${codiPartida}/${numJug}`
  );
  xhr.send(data);
}

function tirarCarta() {
  // Here I declare codiPartida that stores the value from the input.
  let codiPartida = document.getElementById("codiPartida").value;
  let numJug = document.getElementById("numJug").value;
  let carta = document.getElementById("carta").value;

  // The variable data must have this format: codiPartida= is the KEY, and ${codiPartida} is the VALUE.
  let data = `codiPartida=${codiPartida}&numJug=${numJug}&carta=${carta}`;

  xhr.open("PUT", "http://localhost:8888/tirarCarta");
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.send(data);
}

function apostar() {
  // Here I declare codiPartida that stores the value from the input.
  let codiPartida = document.getElementById("codiPartida").value;
  let numJug = document.getElementById("numJug").value;
  let quantitatApostada = document.getElementById("quantitatApostada").value;

  // The variable data must have this format: codiPartida= is the KEY, and ${codiPartida} is the VALUE.
  let data = `codiPartida=${codiPartida}&numJug=${numJug}&quantitatApostada=${quantitatApostada}`;

  xhr.open("PUT", "http://localhost:8888/moureJugador/aposta");
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.send(data);
}

function passar() {
  // Here I declare codiPartida that stores the value from the input.
  let codiPartida = document.getElementById("codiPartida").value;
  let numJug = document.getElementById("numJug").value;

  // The variable data must have this format: codiPartida= is the KEY, and ${codiPartida} is the VALUE.
  let data = `codiPartida=${codiPartida}&numJug=${numJug}`;

  xhr.open("PUT", "http://localhost:8888/moureJugador/passa");
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.send(data);
}

function acabarJoc() {
  // Here I declare codiPartida that stores the value from the input.
  let codiPartida = document.getElementById("codiPartida").value;

  // The variable data must have this format: codiPartida= is the KEY, and ${codiPartida} is the VALUE.
  let data = `codiPartida=${codiPartida}`;

  xhr.open("DELETE", "http://localhost:8888/acabarJoc");
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.send(data);
}

window.addEventListener("load", inici, true);
