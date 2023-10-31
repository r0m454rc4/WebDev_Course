/**
 * Cards game, 7 i mig.
 * @author roma.sarda.casellas373@gmail.com
 */

const express = require("express");
const app = express();

app.use(express.urlencoded({ extended: true }));
app.use(express.json()); // To analize the HTTP petitions that have JSON.

app.post("/iniciarJoc/:codiPartida/:numJug", (req, res) => {}); // To say the number of players, I need to to change the url to /iniciarJoc/:codiPartida/1 (for the player 1), /iniciarJoc/:codiPartida/2 (for player 2), and this will be the number of the player.

app.get("/obtenirCarta/:codiPartida", (req, res) => {
  let nCmpt = 0;

  let generarTipusCarta = (tpCartaAl) => {
    for (let i in tpCartaAl) {
      i = Math.floor(Math.random() * tipusCarta.length);
      tpCartaAl = tpCartaAl[i];

      return tpCartaAl;
    }
  };
  // console.log(generarTipusCarta(tipusCarta));

  let genNumCartaAleatoria = () => {
    let cartaAleatoria = Math.floor(Math.random() * 12) + 1;

    return cartaAleatoria;
  };
  // console.log(genNumCartaAleatoria());

  let tipusCarta = "ors copes espases bastons";
  tipusCarta = tipusCarta.split(" ");

  res.send(
    `La carta aleatòria és: ${genNumCartaAleatoria()} de ${generarTipusCarta(
      tipusCarta
    )}`
  );
});

app.get("/mostrarCartes/:codiPartida", (req, res) => {});

app.put("/tirarCarta/codiPartida/:carta", (req, res) => {});
app.put("/moureJugador/codiPartida/aposta/:quantitat", (req, res) => {});
app.put("/moureJugador/codiPartida/aposta/:passa", (req, res) => {});

app.delete("/acabarJoc/:codiPartida", (req, res) => {});

app.listen(8888, () => console.log("inici servidor"));
