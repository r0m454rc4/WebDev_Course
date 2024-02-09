/**
 * Full REST application.
 * @author roma.sarda.casellas373@gmail.com
 */

const express = require("express");
const app = express();

app.use(express.urlencoded({ extended: true }));
app.use(express.json());

const dispositius = [];

// http://localhost:8888/afegirDispositiu/10.20.1.5/hola/true
app.post("/afegirDispositiu/:IP/:nom/:actiu", (req, res) => {
  let IP = req.params.ip,
    nom = req.params.nom,
    actiu = req.params.actiu;
  let dispositiu = new Dispositiu(IP, nom, actiu);

  dispositius.push(dispositiu);
  res.send(dispositiu);
});

// http://localhost:8888/esborrarDispositiu/10.20.1.5
app.delete("/esborrarDispositiu/:IP", (req, res) => {
  let IP = req.params.ip;
  let dispositiu = dispositius.find((d) => d.IP == IP);
  let index = dispositius.indexOf(dispositiu);

  dispositius.splice(index, 1);
  res.send();
});

// http://localhost:8888/consultarDispositiu/10.20.1.5
app.get("/consultarDispositiu/:IP", (req, res) => {
  // console.log(req.params);
  let IP = req.params.ip;
  let dispositiu = dispositius.find((d) => d.IP == IP);

  if (!dispositiu) res.status(404, "error");
  res.json(dispositiu);
});

// http://localhost:8888/modificarDispositiu/10.20.1.5/adeu/false
app.put("/modificarDispositiu/:IP/:nom/:actiu", (req, res) => {
  let IP = req.params.ip,
    nom = req.params.nom,
    actiu = req.params.actiu;

  let dispositiu = dispositius.find((d) => d.IP == IP);
  console.log(dispositiu);
  let index = dispositius.indexOf(dispositiu);
  console.log(index);

  dispositius[index] = new Dispositiu(IP, nom, actiu);
  console.log(`DPS: ${dispositius}`);
  res.send("Dispositiu modificat.");
});

app.listen(8888, () => console.log("Servidor iniciat a http://localhost:8888"));

class Dispositiu {
  constructor(IP, nom, actiu) {
    this.IP = IP;
    this.nom = nom;
    this.actiu = actiu;
  }
}
