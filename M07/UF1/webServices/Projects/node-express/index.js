/**
 * Cards game.
 * @author roma.sarda.casellas373@gmail.com
 */

const express = require("express");
const app = express();

app.use(express.urlencoded({ extended: true }));
app.use(express.json()); // To analize the HTTP petitions that have JSON.

app.post("/iniciarJoc/:codiPartida", (req, res) => {});

app.get("/obtenirCarta/:codiPartida", (req, res) => {});
app.get("/mostrarCartes/:codiPartida", (req, res) => {});

app.put("/tirarCarta/codiPartida/:carta", (req, res) => {});
app.put("/moureJugador/codiPartida/aposta/:quantitat", (req, res) => {});
app.put("/moureJugador/codiPartida/aposta/:passa", (req, res) => {});

app.delete("/acabarJoc/:codiPartida", (req, res) => {});

app.listen(3000, () => console.log("inici servidor"));
