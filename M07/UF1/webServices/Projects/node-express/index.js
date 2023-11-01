/*
 * Card game, 7 i mig.
 * @author roma.sarda.casellas373@gmail.com
 */

const express = require("express");
const app = express();

app.use(express.urlencoded({ extended: true }));
app.use(express.json()); // To analize HTTP petitions that have JSON.

let partidaIniciada = []; // I use an array because I want to be able to access codiPartida.
let codiPartida = 0;
let totalCartes = []; // Array that stores the cards from the player.
let numJug = 0;

app.post("/iniciarJoc/:codiPartida", (req, res) => {
  // http://localhost:8888/iniciarJoc/1

  codiPartida = req.params.codiPartida; // codiPartida has the value of the parameter from the url.

  if (!partidaIniciada[codiPartida]) {
    partidaIniciada[codiPartida] = true;

    res.send(
      `La partida amb codi ${codiPartida} ha estat inicialitzada correctament.`
    );
  } else {
    res
      .status(404)
      .send(
        `La partida amb codi ${codiPartida} prèviament ja ha estat inicialitzada.`
      );
  }
});

app.get("/obtenirCarta/:codiPartida/:numJug", (req, res) => {
  // http://localhost:8888/obtenirCarta/1/1 --> Player 1 on codiPartida = 1.
  // http://localhost:8888/obtenirCarta/1/2 --> Player 2 on codiPartida = 1.

  codiPartida = req.params.codiPartida;

  if (partidaIniciada[codiPartida]) {
    // Function to generate a random card.
    let generarCarta = (tpCartaAl) => {
      let cartaAleatoria = Math.floor(Math.random() * 12) + 1; // Generate a random card number.

      for (let carta in tpCartaAl) {
        carta = Math.floor(Math.random() * tipusCarta.length);
        tpCartaAl = tpCartaAl[carta];
        break; // In order to get just one card.
      }

      return `${cartaAleatoria} de ${tpCartaAl}`;
    };

    let tipusCarta = ["ors", "espases", "copes", "bastons"];
    let cartaTirada = generarCarta(tipusCarta);

    totalCartes.push(cartaTirada);

    res.send(`La carta aleatòria és: ${cartaTirada}`);
  } else {
    res.status(404).send(`La partida encara no ha estat iniciada.`);
  }
});

app.get("/mostrarCartes/:codiPartida/:numJug", (req, res) => {
  // http://localhost:8888/mostrarCartes/1/1 --> Player 1 on codiPartida = 1.
  // http://localhost:8888/mostrarCartes/1/2 --> Player 2 on codiPartida = 1.

  codiPartida = req.params.codiPartida;

  if (partidaIniciada[codiPartida]) {
    res.send(`El judgador té: ${totalCartes}`);
  } else {
    res.status(404).send(`La partida encara no ha estat iniciada.`);
  }
});

app.put("/tirarCarta/:codiPartida/:numJug/:carta", (req, res) => {});
app.put(
  "/moureJugador/:codiPartida/:numJug/:aposta/:quantitat",
  (req, res) => {}
);
app.put("/moureJugador/:codiPartida/:numJug/:aposta/:passa", (req, res) => {});

app.delete("/acabarJoc/:codiPartida", (req, res) => {});

app.listen(8888, () => console.log("Inici servidor"));
