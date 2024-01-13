/**
 * Card game, 7 & 1/2.
 *
 * @author roma.sarda.casellas373@gmail.com
 * @version 1.0.
 * @date 12.01.24.
 */

const express = require("express");
const { graphqlHTTP } = require("express-graphql");
const { buildSchema } = require("graphql");

// Types.
const { typeDefs } = require("./schema");
const esquema = buildSchema(typeDefs);

// Here I declare some global variables.
let partidaIniciada = [],
  totalCartes = [],
  // quantitatRestant[] is used to store the amount of points of a player.
  quantitatRestant = [];

const arrel = {
  iniciarJoc({ codiPartida }) {
    if (!partidaIniciada[codiPartida]) {
      // If the game hasn't started yet.

      // If the user didn't enter codiPartida, also I have codiPartida == "" because of the calls from the web.
      if (codiPartida == undefined || codiPartida == "") {
        return `La partida no estat inicialitzada a causa de no haver indicat un codi de partida.`;
      } else {
        // If the user had entered codiPartida.
        partidaIniciada[codiPartida] = true;

        // Initialize totalCartes for this partida if not already done, this is because I had a bug when storing cards from different games, I've done this with the help of ChatGPT.
        if (!totalCartes[codiPartida]) {
          totalCartes[codiPartida] = []; // I create it.
        }

        console.log("La partida ha estat inicialitzada");

        return `La partida amb codi ${codiPartida} ha estat inicialitzada correctament.`;
      }
    } else {
      return `La partida amb codi ${codiPartida} prèviament ja ha estat inicialitzada.`;
    }
  },

  obtenirCarta: ({ codiPartida, numJug }) => {
    let partidaIniciadaPrev = false;

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
      let cartaObtinguda = generarCarta(tipusCarta);

      // If I don't have the array to store the cards from the player... I've done this with the help of ChatGPT.
      if (!totalCartes[codiPartida][numJug]) {
        totalCartes[codiPartida][numJug] = []; // I create it.
      }
      console.log(`El jugador ${numJug} ha obtingut ${cartaObtinguda}`);

      // This is to add 100 points to a player when I create it, and it's the first time the player gets a card.
      if (
        totalCartes[codiPartida][numJug].length == 0 &&
        !partidaIniciadaPrev
      ) {
        // console.log(`Estat partida: ${!partidaIniciadaPrev}`);
        quantitatRestant[numJug] = 100;
      }

      // I push the card to the array.
      totalCartes[codiPartida][numJug].push(cartaObtinguda);
      partidaIniciadaPrev = true;

      return `El jugador ${numJug} ha obtingut ${cartaObtinguda}`;
      // (`La carta aleatòria és: ${cartaTirada}`);
    } else {
      return `La partida amb codi ${codiPartida} encara no ha estat inicialitzada.`;
    }
  },

  mostrarCartes: ({ codiPartida, numJug }) => {
    if (partidaIniciada[codiPartida]) {
      // If the player didn't get any yet, will be undefined.
      if (totalCartes[codiPartida][numJug] == undefined) {
        return `El jugador ${numJug} no està jugant en aquesta partida.`;
        // If the player doesn't have any card, because he already throwed them.
      } else if (totalCartes[codiPartida][numJug].length == 0) {
        return `El jugador ${numJug} no té cartes.`;
      } else {
        let cartesRestants = totalCartes[codiPartida][numJug];

        return `Partida ${codiPartida}, jugador ${numJug}: ${cartesRestants}`;

        // (`El jugador ${numJug} té: ${totalCartes[numJug]}`);
      }
    } else {
      return `La partida amb codi ${codiPartida} encara no ha estat inicialitzada.`;
    }
  },
  tirarCarta: ({ codiPartida, numJug, carta }) => {
    if (partidaIniciada[codiPartida]) {
      // This three first conditionals are to check if the parameters are set.
      if (codiPartida == undefined) {
        return `El jugador no pot tirar la carta a causa de no haver indicat el codi de partida.`;
      } else if (numJug == undefined) {
        return `El jugador no pot jugar a la partida ${codiPartida} a causa de no haver indicat el seu codi de jugador`;
      } else if (carta == undefined) {
        return;
        `El jugador ${numJug} no pot tirar la carta a causa de no haver indicat la carta que vol tirar.`;
      } else if (totalCartes[codiPartida][numJug] == undefined) {
        // If the payer doesn't have any card yet.
        return `El jugador ${numJug} no està jugant en aquesta partida.`;
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
          return `El jugador ${numJug} no disposa d'aquesta carta.`;
        } else if (totalCartes[codiPartida][numJug].length == 0) {
          // If the player doesn't have any card, because he already throwed them.
          return `El jugador ${numJug} no té cartes restants.`;
        } else {
          // Delete the card from the player using remove method, I minus 1 to carta because I added it before.
          let cartaTirada = totalCartes[codiPartida][numJug].splice(
            [carta - 1],
            1
          );

          console.log(
            `El jugador ${numJug} ara té ${totalCartes[codiPartida][numJug]}`
          );

          return `El jugador ${numJug} tira la carta ${cartaTirada}`;
        }
      }
    } else {
      if (codiPartida == undefined) {
        return `La partida encara no ha estat inicialitzada.`;
      } else {
        return `La partida amb codi ${codiPartida} encara no ha estat inicialitzada.`;
      }
    }
  },
  moureJugadorAposta: ({ codiPartida, numJug, quantitatApostada }) => {
    let quantitatPuntsJug = [];

    // Initialize the player's points.
    if (!quantitatPuntsJug[numJug]) {
      quantitatPuntsJug[numJug] = quantitatRestant[numJug];
    }

    if (partidaIniciada[codiPartida]) {
      // This three first conditionals are to check if the parameters are set.
      if (codiPartida == undefined) {
        return `El jugador no pot apostar a causa de no haver indicat el codi de partida.`;
      } else if (numJug == undefined) {
        return `El jugador no pot apostar a causa de no haver indicat el seu codi de jugador`;
      } else if (isNaN(quantitatApostada)) {
        return `El jugador ${numJug} no pot apostar a causa de no haver indicat la quantitat.`;
      } else if (totalCartes[codiPartida][numJug] == undefined) {
        // If the payer didn't get any card yet.
        return `El jugador ${numJug} no està jugant en aquesta partida.`;
      } else if (totalCartes[codiPartida][numJug].length == 0) {
        // If the player doesn't have any card, because he already throwed them.
        return `El jugador ${numJug} no pot apostar fitxes a causa de no tenir cartes restants.`;
      } else {
        if (quantitatPuntsJug[numJug] >= quantitatApostada) {
          // console.log(`Quantitat apostada ${quantitatApostada}`);
          quantitatRestant[numJug] -= quantitatApostada;

          return `El jugador ${numJug} aposta ${quantitatApostada} fitxes. Li queden ${quantitatRestant[numJug]} fitxes`;
        } else if (quantitatApostada >= quantitatRestant[numJug]) {
          // If the user wants to bet more points that he have:
          return `El jugador ${numJug} no pot apostar ${quantitatApostada} fitxes, ja que superen la quantitat de fitxes disponibles.`;
        } else if (quantitatRestant[numJug] == 0) {
          return `El jugador ${numJug} no té cap fitxa restant.`;
        }
      }
    } else {
      if (codiPartida == undefined) {
        return `La partida encara no ha estat inicialitzada.`;
      } else {
        return `La partida amb codi ${codiPartida} encara no ha estat inicialitzada.`;
      }
    }
  },
  moureJugadorPassa: ({ codiPartida, numJug }) => {
    if (codiPartida == undefined) {
      return `El jugador no pot apostar a causa de no haver indicat el codi de partida.`;
    } else if (numJug == undefined) {
      return `El jugador no apostar a causa de no haver indicat el seu codi de jugador`;
    } else if (partidaIniciada[codiPartida]) {
      if (totalCartes[codiPartida][numJug] == undefined) {
        return `El jugador ${numJug} no està jugant en aquesta partida.`;
      } else if (totalCartes[codiPartida][numJug].length == 0) {
        // Here I'll never enter.
        return `El jugador ${numJug} no pot passar a causa de no tenir cartes restants.`;
      } else {
        return `El jugador ${numJug} decideix passar en aquest torn.`;
      }
    } else {
      return `La partida amb codi ${codiPartida} encara no ha estat inicialitzada.`;
    }
  },
  acabarJoc({ codiPartida }) {
    if (codiPartida == undefined) {
      return `La partida no estat acabada a causa de no haver indicat un codi de partida.`;
    } else if (partidaIniciada[codiPartida]) {
      // If the game hasn't started yet.
      partidaIniciada[codiPartida] = false;

      // totalCartes[codiPartida] = [] is to reset the array, so the players doesn't have any card if they start the same game again.
      if (totalCartes[codiPartida].length > 0) {
        totalCartes[codiPartida] = [];

        return `La partida amb codi ${codiPartida} ha estat acabada correctament.`;
      } else {
        return `Algun dels jugadors no tenia cap carta, però la partida amb codi ${codiPartida} ha estat acabada correctament.`;
      }
    } else {
      return `La partida amb codi ${codiPartida} encara no ha estat inicialitzada.`;
    }
  },
};

const app = express();
// This is to be able to use the browser and make post, put and delete.
app.use(express.static("public"));

app.use(
  "/graphql",
  graphqlHTTP({
    schema: esquema,
    rootValue: arrel,
    graphiql: false,
  })
);
app.listen(4000);
console.log("Executant servidor GraphQL API a http://localhost:4000/graphql");
