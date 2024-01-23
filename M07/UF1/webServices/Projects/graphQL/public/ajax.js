/**
 * Web graphic client.
 *
 * @author roma.sarda.casellas373@gmail.com
 * @version 1.0.
 * @date 19.01.24.
 */

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
}

function iniciarJoc() {
  // Here I declare codiPartida that stores the value from the input.
  let codiPartida = document.getElementById("codiPartida").value * 1;

  let consulta = `query iniciarJoc($codiPartida: ID!) {
    iniciarJoc(codiPartida: $codiPartida) {
      ... on ResultatBoolea {
          partidaIniciada
      }
      ... on ResultatString {
          missatgeError
      }
    }
  }`;

  fetch(`/iniciarJoc`, {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
      Accept: "application/json",
    },
    body: JSON.stringify({
      // query is taken from consulta.
      query: consulta,
      variables: { codiPartida },
    }),
  })
    .then((r) => r.json())
    .then((dades) => console.log(dades.data.iniciarJoc));
}

function obtenirCarta() {
  // Here I declare codiPartida that stores the value from the input.
  let codiPartida = document.getElementById("codiPartida").value * 1;
  let numJug = document.getElementById("numJug").value * 1;

  let consulta = `query obtenirCarta($codiPartida: ID!, $numJug: Int!) {
    obtenirCarta(codiPartida: $codiPartida, numJug: $numJug)
  }`;

  fetch(`/obtenirCarta/${codiPartida}/${numJug}`, {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
      Accept: "application/json",
    },
    body: JSON.stringify({
      // query is taken from consulta.
      query: consulta,
      variables: { codiPartida, numJug },
    }),
  })
    .then((r) => r.json())
    .then((dades) => console.log(dades.data.obtenirCarta));
}

function mostrarCartes() {
  // Here I declare codiPartida that stores the value from the input.
  let codiPartida = document.getElementById("codiPartida").value * 1;
  let numJug = document.getElementById("numJug").value * 1;

  let consulta = `query mostrarCartes($codiPartida: ID!, $numJug: Int!) {
    mostrarCartes(codiPartida: $codiPartida, numJug: $numJug)
  }`;

  fetch(`/mostrarCartes/${codiPartida}/${numJug}`, {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
      Accept: "application/json",
    },
    body: JSON.stringify({
      // query is taken from consulta.
      query: consulta,
      variables: { codiPartida, numJug },
    }),
  })
    .then((r) => r.json())
    .then((dades) => console.log(dades.data.mostrarCartes));
}

function tirarCarta() {
  // Here I declare codiPartida that stores the value from the input.
  let codiPartida = document.getElementById("codiPartida").value * 1;
  let numJug = document.getElementById("numJug").value * 1;
  let carta = document.getElementById("carta").value * 1;

  let consulta = `mutation tirarCarta($codiPartida: ID!, $numJug: Int!, $carta: Int!) {
    tirarCarta(codiPartida: $codiPartida, numJug: $numJug, carta: $carta)
  }`;

  fetch(`/tirarCarta`, {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
      Accept: "application/json",
    },
    body: JSON.stringify({
      // query is taken from consulta.
      query: consulta,
      variables: { codiPartida, numJug, carta },
    }),
  })
    .then((r) => r.json())
    .then((dades) => console.log(dades.data.tirarCarta));
}

function apostar() {
  // Here I declare codiPartida that stores the value from the input.
  let codiPartida = document.getElementById("codiPartida").value * 1;
  let numJug = document.getElementById("numJug").value * 1;
  let quantitatApostada =
    document.getElementById("quantitatApostada").value * 1;

  let consulta = `mutation moureJugadorAposta($codiPartida: ID!, $numJug: Int!, $quantitatApostada: Int!) {
    moureJugadorAposta(codiPartida: $codiPartida, numJug: $numJug, quantitatApostada: $quantitatApostada)
    }`;

  fetch(`/moureJugador/aposta`, {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
      Accept: "application/json",
    },
    body: JSON.stringify({
      // query is taken from consulta.
      query: consulta,
      variables: { codiPartida, numJug, quantitatApostada },
    }),
  })
    .then((r) => r.json())
    .then((dades) => console.log(dades.data.moureJugadorAposta));
}

function passar() {
  // Here I declare codiPartida that stores the value from the input.
  let codiPartida = document.getElementById("codiPartida").value * 1;
  let numJug = document.getElementById("numJug").value * 1;

  let consulta = `mutation moureJugadorPassa($codiPartida: ID!, $numJug: Int!) {
    moureJugadorPassa(codiPartida: $codiPartida, numJug: $numJug)
    }`;

  fetch(`/moureJugador/passa`, {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
      Accept: "application/json",
    },
    body: JSON.stringify({
      // query is taken from consulta.
      query: consulta,
      variables: { codiPartida, numJug },
    }),
  })
    .then((r) => r.json())
    .then((dades) => console.log(dades.data.moureJugadorPassa));
}

function acabarJoc() {
  // Here I declare codiPartida that stores the value from the input.
  let codiPartida = document.getElementById("codiPartida").value * 1;

  let consulta = `mutation acabarJoc($codiPartida: ID!) {
    acabarJoc(codiPartida: $codiPartida) {
      ... on ResultatBoolea {
          partidaIniciada
      }
      ... on ResultatString {
          missatgeError
      }
    }
    }`;

  fetch(`/acabarJoc`, {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
      Accept: "application/json",
    },
    body: JSON.stringify({
      // query is taken from consulta.
      query: consulta,
      variables: { codiPartida },
    }),
  })
    .then((r) => r.json())
    .then((dades) => console.log(dades.data.acabarJoc));
}

window.addEventListener("load", inici, true);
