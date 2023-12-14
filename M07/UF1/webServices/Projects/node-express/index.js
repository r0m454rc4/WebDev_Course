/**
 * Card game, 7 & 1/2.
 *
 * @author roma.sarda.casellas373@gmail.com
 * @version 1.0.
 * @date 09.11.23.
 */

const express = require("express");
const app = express();
const PORT = 8888;

app.use(express.urlencoded({ extended: true }));
app.use(express.json()); // To analize HTTP petitions that have JSON.
// This is to be able to use the browser and make post, put and delete.
app.use(express.static("public"));

// Here I declare some global variables.
let partidaIniciada = [],
  totalCartes = [];

app.post("/iniciarJoc", (req, res) => {
  // http://localhost:8888/iniciarJoc
  let codiPartida = req.body.codiPartida; // codiPartida has the value of the body from the url.

  if (!partidaIniciada[codiPartida]) {
    // If the game hasn't started yet.

    // If the user didn't enter codiPartida, also I have codiPartida == "" because of the calls from the web.
    if (codiPartida == undefined || codiPartida == "") {
      res.send(
        `La partida no estat inicialitzada a causa de no haver indicat un codi de partida.`
      );
    } else {
      // If the user had entered codiPartida.
      partidaIniciada[codiPartida] = true;

      // Initialize totalCartes for this partida if not already done, this is because I had a bug when storing cards from different games, I've done this with the help of ChatGPT.
      if (!totalCartes[codiPartida]) {
        totalCartes[codiPartida] = []; // I create it.
      }

      res.send(
        `La partida amb codi ${codiPartida} ha estat inicialitzada correctament.`
      );
      console.log("La partida ha estat inicialitzada");
    }
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

  let codiPartida = req.params.codiPartida;
  let numJug = req.params.numJug;

  if (partidaIniciada[codiPartida]) {
    // Function to generate a random card.
    let generarCarta = (tpCartaAl) => {
      let cartaAleatoria = Math.floor(Math.random() * 12) + 1; // Generate a random card number.

      for (let carta in tpCartaAl) {
        carta = Math.floor(Math.random() * tipusCarta.length);
        tpCartaAl = tpCartaAl[carta];

        break; // In order to get just one random card.
      }

      return `${cartaAleatoria} de ${tpCartaAl}`;
    };

    let tipusCarta = ["ors", "espases", "copes", "bastons"];
    let cartaTirada = generarCarta(tipusCarta);

    // If I don't have the array to store the cards from the player... I've done this with the help of ChatGPT.
    if (!totalCartes[codiPartida][numJug]) {
      totalCartes[codiPartida][numJug] = []; // I create it.
    }
    console.log(`El jugador ${numJug} ha obtingut ${cartaTirada}`);

    totalCartes[codiPartida][numJug].push(cartaTirada);

    res.json(`El jugador ${numJug} ha obtingut ${cartaTirada}`);
    // res.send(`La carta aleatòria és: ${cartaTirada}`);
  } else {
    res
      .status(404)
      .send(
        `La partida amb codi ${codiPartida} encara no ha estat inicialitzada.`
      );
  }
});

app.get("/mostrarCartes/:codiPartida/:numJug", (req, res) => {
  // http://localhost:8888/mostrarCartes/1/1 --> Player 1 on codiPartida = 1.
  // http://localhost:8888/mostrarCartes/1/2 --> Player 2 on codiPartida = 1.

  let codiPartida = req.params.codiPartida;
  let numJug = req.params.numJug;

  if (partidaIniciada[codiPartida]) {
    // If the player didn't get any yet, will be undefined.
    if (totalCartes[codiPartida][numJug] == undefined) {
      res
        .status(404)
        .send(`El jugador ${numJug} no està jugant en aquesta partida.`);
      // If the player doesn't have any card, because he already throwed them.
    } else if (totalCartes[codiPartida][numJug].length == 0) {
      res.status(404).send(`El jugador ${numJug} no té cartes.`);
    } else {
      // I send the cards that the player has in a JSON format.
      res.json(
        `Partida ${codiPartida}, jugador ${numJug}: ${totalCartes[codiPartida][numJug]}`
      );
      // res.send(`El jugador ${numJug} té: ${totalCartes[numJug]}`);
    }
  } else {
    res
      .status(404)
      .send(
        `La partida amb codi ${codiPartida} encara no ha estat inicialitzada.`
      );
  }
});

app.put("/tirarCarta", (req, res) => {
  // http://localhost:8888/tirarCarta/1/1/1 --> Player 1 throws the second card on codiPartida = 1.
  // http://localhost:8888/tirarCarta/1/2/2 --> Player 2 throws the third card on codiPartida = 1.

  let codiPartida = req.body.codiPartida;
  let numJug = req.body.numJug;
  let carta = req.body.carta;

  if (partidaIniciada[codiPartida]) {
    // This three first conditionals are to check if the parameters are set.
    if (codiPartida == undefined) {
      res
        .status(404)
        .send(
          `El jugador no pot tirar la carta a causa de no haver indicat el codi de partida.`
        );
    } else if (numJug == undefined) {
      res
        .status(404)
        .send(
          `El jugador no pot jugar a la partida ${codiPartida} a causa de no haver indicat el seu codi de jugador`
        );
    } else if (carta == undefined) {
      res
        .status(404)
        .send(
          `El jugador ${numJug} no pot tirar la carta a causa de no haver indicat la carta que vol tirar.`
        );
    } else if (totalCartes[codiPartida][numJug] == undefined) {
      // If the payer doesn't have any card yet.
      res
        .status(404)
        .send(`El jugador ${numJug} no està jugant en aquesta partida.`);
    } else {
      let cartaTrobada = false;

      for (let i = 0; i < totalCartes[codiPartida][numJug].length; i++) {
        // "i + 1" is because I'd like to be able to delete the first card of the array if the user enters 1.
        if (i + 1 == carta) {
          cartaTrobada = true;
          break;
        }
      }

      if (!cartaTrobada) {
        // If the player doesn't have the card.
        res
          .status(404)
          .send(`El jugador ${numJug} no disposa d'aquesta carta.`);
      } else if (totalCartes[codiPartida][numJug].length == 0) {
        // If the player doesn't have any card, because he already throwed them.
        res.status(404).send(`El jugador ${numJug} no té cartes restants.`);
      } else {
        // Delete the card from the player using remove method, I rest 1 to carta because I added it before.
        res.send(
          `El jugador ${numJug} tira la carta ${totalCartes[codiPartida][
            numJug
          ].splice([carta - 1], 1)}`
        );

        console.log(
          `El jugador ${numJug} ara té ${totalCartes[codiPartida][numJug]}`
        );
      }
    }
  } else {
    if (codiPartida == undefined) {
      res.status(404).send(`La partida encara no ha estat inicialitzada.`);
    } else {
      res
        .status(404)
        .send(
          `La partida amb codi ${codiPartida} encara no ha estat inicialitzada.`
        );
    }
  }
});

// I must finish.
app.put("/moureJugador/aposta", (req, res) => {
  // http://localhost:8888/moureJugador/1/1/aposta/30  --> Player 1 bets 30 points on codiPartida = 1.
  // http://localhost:8888/moureJugador/1/2/aposta/50  --> Player 2 bets 30 points on codiPartida = 1.

  // console.log(quantitatRestant[numJug]);

  let codiPartida = req.body.codiPartida;
  let numJug = req.body.numJug;
  let quantitatApostada = parseInt(req.body.quantitatApostada);

  let quantitatPuntsIni = [],
    quantitatPuntsJug = [],
    quantitatRestant = [];
  quantitatRestant[numJug] = 100;

  // Initialize the player's points if not already done.
  if (!quantitatPuntsIni[numJug]) {
    quantitatPuntsIni[numJug] = quantitatRestant[numJug];
  }

  // Initialize the player's points.
  if (!quantitatPuntsJug[numJug]) {
    quantitatPuntsJug[numJug] = quantitatPuntsIni[numJug];
  }

  if (partidaIniciada[codiPartida]) {
    // This three first conditionals are to check if the parameters are set.
    if (codiPartida == undefined) {
      res
        .status(404)
        .send(
          `El jugador no pot apostar a causa de no haver indicat el codi de partida.`
        );
    } else if (numJug == undefined) {
      res
        .status(404)
        .send(
          `El jugador no pot apostar a causa de no haver indicat el seu codi de jugador`
        );
    } else if (isNaN(quantitatApostada)) {
      res
        .status(404)
        .send(
          `El jugador ${numJug} no pot apostar a causa de no haver indicat la quantitat.`
        );
    } else if (totalCartes[codiPartida][numJug] == undefined) {
      // If the payer didn't get any card yet.
      res
        .status(404)
        .send(`El jugador ${numJug} no està jugant en aquesta partida.`);
    } else if (totalCartes[codiPartida][numJug].length == 0) {
      // If the player doesn't have any card, because he already throwed them.
      res
        .status(404)
        .send(
          `El jugador ${numJug} no pot apostar fitxes a causa de no tenir cartes restants.`
        );
    } else {
      if (quantitatPuntsJug[numJug] >= quantitatApostada) {
        console.log(`Quantitat apostada ${quantitatApostada}`);
        quantitatRestant[numJug] -= quantitatApostada;

        res.send(
          `El jugador ${numJug} aposta ${quantitatApostada} fitxes. Li queden ${quantitatRestant[numJug]} fitxes`
        );
      } else if (quantitatApostada >= quantitatRestant[numJug]) {
        // If the user wants to bet more points that he have:
        res
          .status(404)
          .send(
            `El jugador ${numJug} no pot apostar ${quantitatApostada} fitxes, ja que superen la quantitat de fitxes disponibles.`
          );
      } else if (quantitatRestant[numJug] == 0) {
        res.status(404).send(`El jugador ${numJug} no té cap fitxa restant.`);
      }
    }
  } else {
    if (codiPartida == undefined) {
      res.status(404).send(`La partida encara no ha estat inicialitzada.`);
    } else {
      res
        .status(404)
        .send(
          `La partida amb codi ${codiPartida} encara no ha estat inicialitzada.`
        );
    }
  }
});

app.put("/moureJugador/passa", (req, res) => {
  // http://localhost:8888/moureJugador/1/1/passa
  // http://localhost:8888/moureJugador/1/2/passa

  let codiPartida = req.body.codiPartida;
  let numJug = req.body.numJug;

  if (codiPartida == undefined) {
    res
      .status(404)
      .send(
        `El jugador no pot apostar a causa de no haver indicat el codi de partida.`
      );
  } else if (numJug == undefined) {
    res
      .status(404)
      .send(
        `El jugador no apostar a causa de no haver indicat el seu codi de jugador`
      );
  } else if (partidaIniciada[codiPartida]) {
    if (totalCartes[codiPartida][numJug] == undefined) {
      res
        .status(404)
        .send(`El jugador ${numJug} no està jugant en aquesta partida.`);
    } else if (totalCartes[codiPartida][numJug].length == 0) {
      // Here I'll never enter.
      res
        .status(404)
        .send(
          `El jugador ${numJug} no pot passar a causa de no tenir cartes restants.`
        );
    } else {
      res.send(`El jugador ${numJug} decideix passar en aquest torn.`);
    }
  } else {
    res
      .status(404)
      .send(
        `La partida amb codi ${codiPartida} encara no ha estat inicialitzada.`
      );
  }
});

app.delete("/acabarJoc", (req, res) => {
  // http://localhost:8888/acabarJoc/1

  let codiPartida = req.body.codiPartida; // codiPartida has the value of the parameter from the url.

  if (codiPartida == undefined) {
    res
      .status(404)
      .send(
        `La partida no estat acabada a causa de no haver indicat un codi de partida.`
      );
  } else if (partidaIniciada[codiPartida]) {
    // If the game hasn't started yet.
    partidaIniciada[codiPartida] = false;

    // totalCartes[codiPartida] = [] is to reset the array, so the players doesn't have any card if they start the same game again.
    if (totalCartes[codiPartida].length > 0) {
      totalCartes[codiPartida] = [];

      res.send(
        `La partida amb codi ${codiPartida} ha estat acabada correctament.`
      );
    } else {
      res.send(
        `Algun dels jugadors no tenia cap carta, però la partida amb codi ${codiPartida} ha estat acabada correctament.`
      );
    }
  } else {
    res
      .status(404)
      .send(
        `La partida amb codi ${codiPartida} encara no ha estat inicialitzada.`
      );
  }
});

app.listen(PORT, () =>
  console.log(`Servidor funcionant en http://localhost:${PORT}`)
);
