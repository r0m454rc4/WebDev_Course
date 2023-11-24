/**
 * Full REST application.
 * @author roma.sarda.casellas373@gmail.com
 */

const express = require("express");
const app = express();

app.use(express.urlencoded({ extended: true }));
app.use(express.json()); // per analitzar les peticions HTTP que portin JSON al body

let alumnes = [
  { codi: 1, nom: "SERGI", nota: 9 },
  { codi: 2, nom: "ANNA", nota: 8 },
  { codi: 3, nom: "JOAN", nota: 7 },
];
app.get("/", (req, res) => res.send("hola"));

app.get("/api/alumnes", (req, res) => res.send(alumnes));

// Calcular nota mitjana.
app.get("/api/alumnes/calcularMitjana", (req, res) => {
  // console.log("Entra mitjana");
  let suma = 0;

  for (let i = 0; i < alumnes.length; i++) {
    suma += alumnes[i].nota;
  }

  res.send(new String(suma / alumnes.length)); // new String is to convert the operation to a string.
});

app.get("/api/alumnes/:codi", (req, res) => {
  let alumne = alumnes.find((a) => a.codi === parseInt(req.params.codi)); // parseInt(req.params.codi) is the variable that collects data.
  if (!alumne) res.status(404, "error");
  res.send(alumne);
});

// Create an alumn.
app.post("/api/alumnes", (req, res) => {
  console.log("req.body.codi");
  let alumne = {
    codi: parseInt(req.body.codi),
    nom: req.body.nom,
    nota: parseInt(req.params.nota),
  }; // If I don't have parseInt(req.body.codi) in codi, it adds the codi as a string.
  alumnes.push(alumne);
  res.send(alumnes);
});

app.delete("/api/alumnes/:codi", (req, res) => {
  var alumne = alumnes.find((a) => a.codi === parseInt(req.params.codi));
  var index = alumnes.indexOf(alumne);
  alumnes.splice(index, 1);
  res.send();
});

app.put("/api/alumnes/:codi", (req, res) => {
  let nouAlumne = {
    codi: parseInt(req.body.codi),
    nom: req.body.nom,
    nota: parseInt(req.body.nota),
  };
  let alumne = alumnes.find((a) => a.codi === parseInt(req.params.codi));
  let index = alumnes.indexOf(alumne);
  alumnes[index] = nouAlumne;
  res.send("Alumne modificat.");
});

app.listen(3000, () => console.log("inici servidor"));
